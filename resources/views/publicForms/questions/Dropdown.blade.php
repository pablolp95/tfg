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
            <select id="form_answer-{{ $question->id }}" name="form_answer[{{ $question->id }}]" @if($question->typable->required) required @endif>
                <option value="" disabled selected>Elige una opción</option>
                @php
                    if($question->typable->alphabetically){
                        $options = $question->typable->options->sortBy('option_value');
                    }
                    else {
                        $options = $question->typable->options->sortBy('position');
                    }
                @endphp
                @foreach($options as $option)
                    <option value="{{  $option->option_value }}">{{ $option->option_value }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
