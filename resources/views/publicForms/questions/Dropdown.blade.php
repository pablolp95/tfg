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
            <select id="form_answer-{{ $question->id }}" name="form_answer[{{ $question->id }}]">
                <option value="" disabled selected>Elige una opción</option>
                @foreach($question->typable->options as $option)
                    <option value="{{  $option->option_value }}">{{ $option->option_value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
