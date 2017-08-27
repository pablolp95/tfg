<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Fecha</h4>
        </div>
        <div class="modal-body">
            {!! Form::open(["method" => "post", "route" => "questions.store", "id" => "question-form"]) !!}
            <input type="hidden" name="type" value="Date">
            <input id="form_id" type="hidden" name="form_id" value="">
            <input id="icon" type="hidden" name="icon" value="">

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
                {!! Form::text("max_num_characters", null, ["id" => "max_num_characters"]) !!}
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