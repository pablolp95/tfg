<div class="question-field">
    {!! Form::label("text", "Pregunta") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("","Rango:") !!}
    <span>de</span>
    {!! Form::select('range_min', ['0' => '0', '1' => '1'], isset($question) ? $question->typable->range_min : '0', ["id" => "range_min"]) !!}
    <span>a</span>
    {!! Form::select('range_max', ['2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    '6' => '6',
    '7' => '7',
    '8' => '8',
    '9' => '9',
    '10' => '10'],
     isset($question) ? $question->typable->range_max : '2', ["id" => "range_max"]) !!}
</div>

<div class="question-field">
    {!! Form::label("left_tag", "Etiqueta izquierda:") !!}
    {!! Form::text("left_tag", isset($question) ? $question->typable->left_tag : null, ["id" => "left_tag"]) !!}
</div>

<div class="question-field">
    {!! Form::label("right_tag", "Etiqueta derecha:") !!}
    {!! Form::text("right_tag", isset($question) ? $question->typable->right_tag : null, ["id" => "right_tag"]) !!}
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
