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
        <label for="form_answer-{{ $question->id }}">¿Acepta las condiciones?</label>
        <ul>
            <li class="optiom-item">
                <p>
                    <input type="radio" id="form_answer-{{ $question->id }}-1" name="form_answer[{{ $question->id }}]" value="1"/>
                    <label for="form_answer-{{ $question->id }}-1">Si</label>
                </p>
            </li>
            <li class="optiom-item">
                <p>
                    <input type="radio" id="form_answer-{{ $question->id }}-2" name="form_answer[{{ $question->id }}]" value="0"/>
                    <label for="form_answer-{{ $question->id }}-2">No</label>
                </p>
            </li>
        </ul>
    </div>
</div>