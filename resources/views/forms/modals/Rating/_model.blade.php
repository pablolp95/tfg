<div class="question-field">
    {!! Form::label("text", "Pregunta") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("range", "Rango") !!}
    {!! Form::text("range", isset($question) ? $question->typable->range : null, ["id" => "range"]) !!}
</div>

@include('forms.modals._image_video_model')

<div class="question-field">
    {{--{!! Form::label("shape", "Forma") !!}
    {!! Form::select('shape', ['star' => 'Estrella',
        'check-circle' => 'MM/DD/YYYY',
        'YYYY/MM/DD' => 'YYYY/MM/DD'],
        isset($question) ? $question->typable->format : 'DD/MM/YYYY') !!} --}}
    {!! Form::label("shape", "Forma") !!}
    <select id="shape" name="shape">
        <option value="star">&#xf005 Estrella</option>
        <option value="check">&#xf058 Check</option>
        <option value="heart">&#xf004 Corazón</option>
        <option value="hourglass">&#xf254 Reloj de arena</option>
        <option value="thumbs-up">&#xf164 Pulgar arriba</option>
        <option value="thumbs-down">&#xf165 Pulgar abajo</option>
        <option value="happy">&#xf118 Cara feliz</option>
        <option value="sad">&#xf119 Cara triste</option>
    </select>
</div>


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
