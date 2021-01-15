@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="{{ route('questionnaire.create') }}" class="btn btn-dark">Create a new questionnaire</a>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                        <li class="list-group-item"><a href="{{ route('questionnaire.show', $questionnaire->id) }}">{{ $questionnaire->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
