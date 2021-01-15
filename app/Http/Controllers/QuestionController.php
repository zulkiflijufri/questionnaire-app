<?php

namespace App\Http\Controllers;

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
}
