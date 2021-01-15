@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    <a href="{{ route('question.create', $questionnaire->id) }}" class="btn btn-dark">Add new question</a>
                    @if($questionnaire->questions()->count())
                    <a href="{{ route('survey.show', ['questionnaire' => $questionnaire->id, 'slug' => Str::slug($questionnaire->title)]) }}" class="btn btn-dark">Take a survey</a>
                    @endif
                </div>
            </div>

            @foreach($questionnaire->questions as $question)
            <div class="card mt-3">
                <div class="card-header">{{ $question->question }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($question->answers as $answer)
                        <li class="list-group-item"> {{ $answer->answer }} </li>
                        @endforeach
                    </ul>
                    <div class="mt-2">
                        <form action="{{ route('question.delete', ['questionnaire' => $questionnaire->id, 'question' => $question->id]) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
