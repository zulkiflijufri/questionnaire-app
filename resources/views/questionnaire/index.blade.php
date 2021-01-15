@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Questionnaires') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                        <li class="list-group-item">
                            <a href="{{ route('questionnaire.show', $questionnaire->id) }}">{{ $questionnaire->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
