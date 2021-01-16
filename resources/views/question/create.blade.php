@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5" style="overflow:auto; height:500px; position:relative">
            <div class="card">
                <div class="card-header">{{ __('Create a new question') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('question.store', $questionnaire->id) }}" method="post" id="form">
                        @csrf

                        <div class="form-group">
                            <label for="question_type">Type</label>
                            <select name="question_type" id="question_type" class="form-control">
                                <option value="choose" id="choose">Choose option question</option>
                                <option value="text">Text</option>
                                <option value="textarea">Textarea</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">Checkbox</option>
                            </select>
                        </div>

                        {{-- area input or textarea --}}
                        <div class="form-group" id="inputText" hidden>
                            <label for="question">Question</label>
                            <input type="text" name="questionInput[question]" id="question" class="form-control" value="{{ old('questionInput.question') }}" placeholder="Input question">
                        </div>

                        {{-- area radio or checkbox --}}
                        <div class="form-group" id="checkRadio" hidden>
                            <label for="question">Question</label>
                            <input type="text" name="question[question]" id="question" class="form-control" value="{{ old('question.question') }}" placeholder="Input question">
                        </div>
                        <div class="form-group type_checkbox_or_radio"></div>
                        <button type="submit" class="btn btn-sm btn-dark" disabled>Add question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
