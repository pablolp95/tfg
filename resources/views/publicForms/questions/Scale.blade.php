<div class="card">
    <div class="card-content black-text">
        <span class="card-title">
            @if($question->typable->required)<span>*</span>@endif
            {{$question->text}}
        </span>
        @if(!is_null($question->description))
            <div class="description">
                <p>{{$question->description}}</p>
            </div>
        @endif
    </div>
    <div class="card-action center">
        <ul>
            @for ($i = $question->typable->range_min; $i <= $question->typable->range_max; ++$i)
                <li class="optiom-item">
                    <p>
                        <input type="radio" id="form_answer_{{ $question->id }}_{{$i}}" name="form_answer[{{ $question->id }}]" value="{{$i}}"/>
                        <label for="form_answer_{{ $question->id }}_{{$i}}">{{$i}}</label>
                    </p>
                </li>
            @endfor
        </ul>
    </div>
</div>