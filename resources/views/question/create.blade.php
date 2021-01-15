@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a new question') }}</div>

                <div class="card-body">
                    <form action="{{ route('question.store', $questionnaire->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question[question]" id="question" class="form-control" value="{{ old('question.question') }}" placeholder="Input question">
                            @error('question.question')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choice</legend>
                                <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, ex maiores natus ratione odio et aut laboriosam tempora perferendis amet? Dolorem, sit. Perferendis esse voluptatum maiores aperiam pariatur nihil harum?</small>
                                <div class="form-group">
                                    <label for="answer1">Choice 1</label>
                                    <input type="text" name="answers[][answer]" id="answer1" class="form-control" value="{{ old('answers.0.answer') }}" placeholder="Input choice 1">
                                    @error('answers.0.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="answer2">Choice 2</label>
                                    <input type="text" name="answers[][answer]" id="answer2" class="form-control" value="{{ old('answers.1.answer') }}" placeholder="Input choice 2">
                                    @error('answers.1.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="answer3">Choice 3</label>
                                    <input type="text" name="answers[][answer]" id="answer3" class="form-control" value="{{ old('answers.2.answer') }}" placeholder="Input choice 3">
                                    @error('answers.2.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="answer4">Choice 4</label>
                                    <input type="text" name="answers[][answer]" id="answer4" class="form-control" value="{{ old('answers.3.answer') }}" placeholder="Input choice 4">
                                    @error('answers.3.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-sm btn-dark">Add question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
