<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $this->validate(request(), [
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $questionnaire->questions()->create(request('question'));
        $question->answers()->createMany(request('answers'));

        return redirect()->route('questionnaire.show', $questionnaire->id);
    }

    public function delete(Questionnaire $questionnaire, Question $question)
    {
        $question->responses()->delete();
        $question->answers()->delete();
        $question->delete();

        return back();
    }

    public function edit(Questionnaire $questionnaire, Question $question)
    {
        $question->load('answers');

        return view('question.edit', compact('questionnaire', 'question'));
    }

    public function update(Questionnaire $questionnaire, Question $question)
    {
        $this->validate(request(), [
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        // dd(request('answers.0.answer'));
        $questionnaire->questions()->update(request('question'));

        foreach ($question->answers as $key => $answer) {
            # code...
            $a = Answer::where('id', $answer->id)
                ->where('question_id', $question->id)
                ->first();

            $a->update(['answer' => request('answers.' . $key . '.answer')]);
        }

        return redirect()->route('questionnaire.show', $questionnaire->id);
    }
}
