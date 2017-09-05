<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Cuadrícula</h4>
        </div>
        <div class="modal-body">
            {!! Form::model($question,["method" => "put", "route" => array("questions.update", $question->id), "id" => "question-form"]) !!}
            @include('forms.modals.Grid._model')
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
            <button id="cancel-question" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="edit-question" type="button" class="btn btn-primary" value="{{$question->id}}">Guardar</button>
        </div>
    </div>
</div>