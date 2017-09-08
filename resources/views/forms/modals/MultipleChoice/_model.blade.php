<div class="question-field">
    {!! Form::label("text", "Pregunta") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "3"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "3"]) !!}
</div>

<div class="question-field">
    {!! Form::label("options", "Opciones") !!}
    <ul id="question-options" class="list-unstyled">
        @isset($question)
            @foreach($question->typable->options->sortBy('position') as $option)
                <li class="option-item">
                    <input name="options_id[]" value="{{$option->id}}" type="hidden">
                    <input name="options_value[]" class="question-option" type="text" value="{{$option->option_value}}">
                    <span class="glyphicon glyphicon-move move-option" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove delete-option" aria-hidden="true"></span>
                </li>
            @endforeach
        @endisset
        <li id="add-option-item">
            <span class="add-option-button">Añadir una opción</span>
        </li>
    </ul>

</div>

@include('forms.modals._image_video_model')

<div class="question-field">
    {!! Form::label("required", "Obligatoria:") !!}
    <label class="radio-inline">
        {!! Form::radio('required', '1', isset($question) ? $question->typable->required : 0); !!}
        Si
    </label>
    <label class="radio-inline">
        {!! Form::radio('required', '0', isset($question) ? !$question->typable->required : 1); !!}
        No
    </label>
</div>

<div class="question-field">
    {!! Form::label("multiple", "Selección múltiple:") !!}
    <label class="radio-inline">
        {!! Form::radio('multiple', '1', isset($question) ? $question->typable->multiple : 0); !!}
        Si
    </label>
    <label class="radio-inline">
        {!! Form::radio('multiple', '0', isset($question) ? !$question->typable->multiple : 1); !!}
        No
    </label>
</div>

<div class="question-field">
    {!! Form::label("random", "Orden aleatorio:") !!}
    <label class="radio-inline">
        {!! Form::radio('random', '1', isset($question) ? $question->typable->random : 0); !!}
        Si
    </label>
    <label class="radio-inline">
        {!! Form::radio('random', '0', isset($question) ? !$question->typable->random : 1); !!}
        No
    </label>
</div>

<script>
    sortable('#question-options',{
        items: '.option-item',
        handle: '.move-option',
        forcePlaceholderSize: true
    });
</script>