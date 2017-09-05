<div class="card">
    <div class="card-content black-text">
        <span class="card-title">{{$question->text}}</span>
        @if(!is_null($question->description))
            <div class="description">
                <p>{{$question->description}}</p>
            </div>
        @endif
    </div>
    <div class="card-action">
        <ul>
            @if(!$question->typable->multiple)
                @foreach($question->typable->options as $option)
                    <li class="optiom-item">
                        <p>
                            <input type="radio" id="form_answer_{{ $question->id }}_{{$option->id}}" name="form_answer[{{ $question->id }}]" value="{{$option->option_value}}"/>
                            <label for="form_answer_{{ $question->id }}_{{$option->id}}">{{$option->option_value}}</label>
                        </p>
                    </li>
                @endforeach
            @else
                @foreach($question->typable->options as $option)
                    <li class="optiom-item">
                        <p>
                            <input type="checkbox" class="filled-in" id="form_answer_{{ $question->id }}_{{$option->id}}" name="form_answer[{{ $question->id }}][]" value="{{$option->option_value}}"/>
                            <label for="form_answer_{{ $question->id }}_{{$option->id}}">{{$option->option_value}}</label>
                        </p>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>