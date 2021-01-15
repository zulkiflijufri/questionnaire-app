<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug)
    {
        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $this->validate(request(), [
            'responses.*.answer_id' => 'required',
        ]);

        $survey = $questionnaire->surveys()->create([
            'name' => request()->user()->name,
            'email' => request()->user()->email,
        ]);

        $survey->responses()->createMany(request('responses'));

        return 'Thanks';
    }
}
