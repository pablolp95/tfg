@php
    $checked = false
@endphp
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
            @foreach($question->typable->options->sortBy('position') as $option)
                @php
                    $checked = false;
                    if(!is_null($answer)){
                        $item = $answer->filter(function ($model) use ($option) {
                            return $model->value == $option->option_value;
                        })->first();
                        if(!is_null($item)) {
                            $checked = true;
                        }
                    }
                @endphp
                @if($question->typable->multiple)
                    <label class="checkbox-inline">
                        <input type="checkbox" disabled @if($checked) checked @endif> {{$option->option_value}}
                    </label>
                @else
                    <label class="radio-inline">
                        <input type="radio" disabled @if($checked) checked @endif> {{$option->option_value}}
                    </label>
                @endif
            @endforeach
        </div>
    </div>
</div>