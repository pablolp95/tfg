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
    <div class="card-action">
        <div class="input-field">
            <textarea id="form_answer-{{ $question->id }}" name="form_answer[{{ $question->id }}]" maxlength="{{$question->typable->max_num_characters}}" class="materialize-textarea" @if($question->typable->required) required @endif></textarea>
            <label for="form_answer-{{ $question->id }}">Respuesta</label>
        </div>
    </div>
</div>