<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        if (request('question_type') == 'radio' || request('question_type') == 'checkbox') {
            $messages = [
                'question.question.required' => 'The question is required bro',
                'answers.*.answer.required' => 'The answers can not be null'
            ];

            $this->validate(request(), [
                'question.question' => 'required',
                'answers.*.answer' => 'required',
            ], $messages);

            dd(request()->all());

            /**
             * TODO: insert data only question and answers
             */
        } elseif (request('question_type') == 'text' || request('question_type') == 'textarea') {
            $messages = ['questionInput.question.required' => 'The question is required'];

            $this->validate(request(), [
                'questionInput.question' => 'required',
            ], $messages);

            dd($request->all());
            /**
             * TODO: insert data only questionInput
             */
        }

        $question = $questionnaire->questions()->create(request('question')); // remember: insert question_type

        if (request('question_type') == 'radio' || request('question_type') == 'checkbox') {
            $question->answers()->createMany(request('answers'));
        }

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
        $question->update(request('question'));

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
