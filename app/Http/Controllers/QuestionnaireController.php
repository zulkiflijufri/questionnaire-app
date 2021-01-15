<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::all();

        return view('questionnaire.index', compact('questionnaires'));
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $data = $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        request()->user()->questionnaires()->create($data);

        return redirect()->route('questionnaires.index');
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers');

        return view('questionnaire.show', compact('questionnaire'));
    }

    public function delete(Questionnaire $questionnaire)
    {
        // delete responses
        foreach ($questionnaire->questions as $question) {
            foreach ($question->answers as $answer) {
                $answer->responses()->delete();
            }

            // delete answers
            $question->answers()->delete();
        }

        $questionnaire->questions()->delete();
        $questionnaire->surveys()->delete();
        $questionnaire->delete();

        return back();
    }
}
