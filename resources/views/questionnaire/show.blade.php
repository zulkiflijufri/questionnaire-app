@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6" style="overflow:auto; height:500px; position:relative">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    <a href="{{ route('question.create', $questionnaire->id) }}" class="btn btn-dark">Add new question</a>
                    @if($questionnaire->questions()->count())
                    <a href="{{ route('survey.show', ['questionnaire' => $questionnaire->id, 'slug' => Str::slug($questionnaire->title)]) }}" class="btn btn-dark">Take a survey</a>
                    @endif
                </div>
            </div>

            @foreach($questionnaire->questions as $key => $question)
            <div class="card mt-3">
                <a style="color: black; text-decoration: none" data-toggle="collapse" href="#collapseQuestion{{ $key }}" role="button" aria-expanded="false" aria-controls="collapseQuestion{{ $key }}">
                    <div class="card-header">
                        {{ $question->question }}
                    </div>
                </a>
                <div class="collapse" id="collapseQuestion{{ $key }}">
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                            <li class="list-group-item"> {{ $answer->answer }} </li>
                            @endforeach
                        </ul>
                        <div class="mt-3 d-flex">
                            <form action="{{ route('question.delete', ['questionnaire' => $questionnaire->id, 'question' => $question->id]) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('question.edit', ['questionnaire' => $questionnaire->id, 'question' => $question->id]) }}" class="btn btn-sm btn-info ml-2 text-white">Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
