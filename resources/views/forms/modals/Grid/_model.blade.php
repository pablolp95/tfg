<div class="question-field">
    {!! Form::label("text", "Pregunta") !!}
    {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "3"]) !!}
</div>

<div class="question-field">
    {!! Form::label("description", "Descripción") !!}
    {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "3"]) !!}
</div>

<div class="question-field">
    {!! Form::label("rows", "Filas") !!}
    <ul id="rows" class="list-unstyled">
        @isset($question)
            @foreach($question->typable->rows->sortBy('position') as $row)
                <li class="option-item">
                    <input name="rows_id[]" value="{{$row->id}}" type="hidden">
                    <input name="rows_value[]" class="question-option" type="text" value="{{$row->value}}">
                    <span class="glyphicon glyphicon-move move-option" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove delete-option" aria-hidden="true"></span>
                </li>
            @endforeach
        @endisset
        <li id="add-row-item">
            <span class="add-row-button">Añadir una fila</span>
        </li>
    </ul>
</div>

<div class="question-field">
    {!! Form::label("columns", "Columnas") !!}
    <ul id="columns" class="list-unstyled">
        @isset($question)
            @foreach($question->typable->columns->sortBy('position') as $column)
                <li class="option-item">
                    <input name="columns_id[]" value="{{$column->id}}" type="hidden">
                    <input name="columns_value[]" class="question-option" type="text" value="{{$column->value}}">
                    <span class="glyphicon glyphicon-move move-option" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-remove delete-option" aria-hidden="true"></span>
                </li>
            @endforeach
        @endisset
        <li id="add-column-item">
            <span class="add-column-button">Añadir una columna</span>
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

<script>
    sortable('#rows',{
        items: '.option-item',
        handle: '.move-option',
        forcePlaceholderSize: true
    });

    sortable('#columns',{
        items: '.option-item',
        handle: '.move-option',
        forcePlaceholderSize: true
    });
</script>