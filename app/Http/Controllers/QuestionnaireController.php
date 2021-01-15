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

        return redirect()->route('qustionnaires.index');
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaire.show', compact('questionnaire'));
    }
}
