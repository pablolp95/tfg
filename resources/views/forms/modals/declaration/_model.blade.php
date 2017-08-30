<div class="question-field">
    {!! Form::label("text", "Texto") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "4"]) !!}
</div>

<div class="question-field">
    {!! Form::label("button_text", "Texto del botón") !!}
    {!! Form::text("button_text", isset($question) ? $question->typable->button_text : null, ["id" => "button_text"]) !!}
</div>