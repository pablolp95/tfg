<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Texto</h4>
        </div>
        <div class="modal-body">
            <div class="question-field">
                {!! Form::label("text", "Texto") !!}
                {!! Form::textarea("text", null, ["id" => "text", "class" => "form-control","rows" => "4"]) !!}
            </div>

            <div class="question-field">
                {!! Form::label("description", "Descripción") !!}
                {!! Form::textarea("description", null, ["id" => "description", "class" => "form-control","rows" => "4"]) !!}
            </div>

            <div class="question-field">
                {!! Form::label("button", "Botón") !!}
                {!! Form::text("button", null, ["id" => "button"]) !!}
            </div>
        </div>
        <div class="modal-footer">
            <button id="cancel-question" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="add-question" type="button" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>