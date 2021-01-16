@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit a new question') }}</div>

                <div class="card-body">
                    <form action="{{ route('question.update', ['questionnaire' => $questionnaire->id, 'question' => $question->id]) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question[question]" id="question" class="form-control" value="{{ old('question.question', $question->question) }}" placeholder="Input question">
                            @error('question.question')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choice</legend>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, ex maiores natus ratione odio et aut laboriosam tempora perferendis amet? Dolorem, sit. Perferendis esse voluptatum maiores aperiam pariatur nihil harum?</small>
                                @foreach($question->answers as $key => $answer)
                                <div class="form-group">
                                    <label for="answer1">Choice {{ $key + 1 }}</label>
                                    <input type="text" name="answers[][answer]" id="answer1" class="form-control" value="{{ old('answers.'.$key.'.answer', $answer->answer)}}" placeholder="Input choice {{ $key+1 }}">
                                    @error('answers.'.$key.'.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @endforeach
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-sm btn-dark">Update question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
