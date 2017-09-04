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
        <div class="input-field">
            <input id="form_answer-{{ $question->id }}" name="form_answer[{{ $question->id }}]" type="text" class="datepicker">
            <label for="form_answer-{{ $question->id }}">Respuesta</label>
        </div>
    </div>
</div>