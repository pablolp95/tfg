<div class="question-field">
    {!! Form::label("text", "Pregunta") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("max_num_characters", "Número máximo de carácteres") !!}
    {!! Form::text("max_num_characters", isset($question) ? $question->typable->max_num_characters : null, ["id" => "max_num_characters"]) !!}
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
