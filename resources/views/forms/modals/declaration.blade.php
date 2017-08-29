<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Texto</h4>
        </div>
        <div class="modal-body">
            {!! Form::open(["method" => "post", "route" => "questions.store", "id" => "question-form"]) !!}
            <input type="hidden" name="type" value="Declaration">
            <input id="form_id" type="hidden" name="form_id" value="">
            <input id="icon" type="hidden" name="icon" value="">

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
                {!! Form::text("button_text", null, ["id" => "button_text"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
            <button id="cancel-question" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="add-question" type="button" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>