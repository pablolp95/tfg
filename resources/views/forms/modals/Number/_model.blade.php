<div class="question-field">
    {!! Form::label("text", "Pregunta") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("","Rango de valores:") !!}
    {!! Form::text("range_min", isset($question) ? $question->typable->range_min : null, ["id" => "range_min"]) !!}
    <span>a</span>
    {!! Form::text("range_max", isset($question) ? $question->typable->range_max : null, ["id" => "range_max"]) !!}
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
