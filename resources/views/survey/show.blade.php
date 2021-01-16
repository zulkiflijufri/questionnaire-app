@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5" style="overflow:auto; height:500px; position:relative">

            <h3>Questionnaire: {{ $questionnaire->title }} </h3>

            <form action="{{ route('survey.store', ['questionnaire' => $questionnaire->id, 'slug' => Str::slug($questionnaire->title)]) }}" method="post">
                @csrf

                @foreach($questionnaire->questions as $key => $question)
                <div class="card mt-3">
                    <div class="card-header"><strong>{{ $key+1 }}. </strong> {{ $question->question }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                            <label for="answer{{ $answer->id }}">
                                <li class="list-group-item">
                                    <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">

                                    <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" class="mr-2" value="{{ $answer->id }}" {{ (old('responses.' . $key. '.answer_id') == $answer->id ? 'checked' : '') }}>
                                    {{ $answer->answer }}
                                </li>
                            </label>
                            @endforeach
                            @error('responses.' . $key . '.answer_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </ul>
                    </div>
                </div>
                @endforeach

                <div class="mt-3">
                    <button type="submit" class="btn btn-sm btn-dark">Submit survey</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
