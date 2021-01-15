@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    <a href="{{ route('question.create', $questionnaire->id) }}" class="btn btn-dark">Add new question</a>

                    <div class="mt-3">
                        <p>List Questions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
