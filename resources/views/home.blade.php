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
                        @forelse($questionnaires as $questionnaire)
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="{{ route('questionnaire.show', $questionnaire->id) }}">{{ $questionnaire->title }}</a>
                            <form action="{{ route('questionnaire.delete', $questionnaire->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </li>
                        @empty
                        <h3 class="text-center">No questionnaire</h3>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
