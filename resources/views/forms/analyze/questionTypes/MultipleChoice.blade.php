<div class="panel panel-default">
    <div class="panel-body">
        <div class="question-response">
            <h3>{{$question->text}}</h3>
            @if(!is_null($question->description))
                <div class="description">
                    <p>{{$question->description}}</p>
                </div>
            @endif
        </div>
        <div class="question-answer">
            @if(!$question->typable->multiple)
                @foreach($question->typable->options->sortBy('position') as $option)
                    <label class="radio-inline">
                        <input type="radio" name="example" disabled @if($answer->value == $option->option_value) checked @endif> {{$option->option_value}}
                    </label>
                @endforeach
            @else
                @foreach($question->typable->options->sortBy('position') as $option)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="example" disabled @if($answer->value == $option->option_value) checked @endif> {{$option->option_value}}
                    </label>
                @endforeach
            @endif
        </div>
    </div>
</div>