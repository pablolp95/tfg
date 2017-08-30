<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Desplegable</h4>
        </div>
        <div class="modal-body">
            {!! Form::open(["method" => "post", "route" => "questions.store", "id" => "question-form"]) !!}
            <input name="type" type="hidden" value="Dropdown">
            <input id="form_id" type="hidden" name="form_id" value="">
            <input id="icon" type="hidden" name="icon" value="">
            <input id="question-position" type="hidden" name="position" value="">

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
                    <li id="add-option-item">
                        <span class="add-option-button">Añadir una opción</span>
                    </li>
                </ul>

            </div>

            <div class="question-field">
                {!! Form::label("required", "Obligatoria:") !!}
                <label class="radio-inline">
                    <input type="radio" value="1" name="required">Si
                </label>
                <label class="radio-inline">
                    <input checked type="radio" value="0" name="required">No
                </label>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
            <button id="cancel-question" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="add-question" type="button" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>