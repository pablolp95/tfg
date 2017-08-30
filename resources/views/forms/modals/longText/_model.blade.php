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

<div class="question-field">
    {!! Form::label("required", "Obligatoria:") !!}
    <?php
        $yes = false;
        $no = true;
        if( isset($question) ) {
            $question->typable->required == 1 ? ($yes = true AND $no = false) : ($yes = false AND $no = true);
        }
    ?>
    <label class="radio-inline">
        {!! Form::radio('required', '1', $yes); !!}
        Si
    </label>
    <label class="radio-inline">
        {!! Form::radio('required', '0', $no); !!}
        No
    </label>
</div>
