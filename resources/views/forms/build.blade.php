@extends('layouts.app')

@section('title')
    {{$form->name}} - Construir | TFG Pablo
@endsection

@section('css')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('components/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
@endsection

@section('subnav')
    <div class="container-fluid">
        <div class="row">
            <div class="subnav col-xs-12">
                <div class="return-workspace">
                    <a href=" {{route('workspaces.show',['id' => $form->workspace->id])}} ">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                    </a>
                </div>
                <div id="layout-name">
                    <span id="resource-name">{{ $form->name }}</span>
                    <span class="glyphicon glyphicon-pencil" style="color: white"></span>
                </div>
                <div id="received-message">
                </div>
                <div class="forms-links-wrapper">
                    <ul class="form-links list-unstyled">
                        <li class="active">
                            <a href=" {{route('forms.show',['id' => $form->id])}} ">Construir</a>
                        </li>
                        <li>
                            <a href=" {{route('forms.share',['id' => $form->id])}} ">Compartir</a>
                        </li>
                        <li>
                            <a href=" {{route('forms.analyze',['id' => $form->id])}} ">Analizar</a>
                        </li>
                    </ul>
                </div>
                <div id="show-form">
                    <a href="{{ url('/view/form/'.$form->id) }}">Ver formulario</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row row-eq-height">
            <div id="question-types" class="col-xs-3 sidebar">
                <ul class="list-group question-types">
                    <li class="list-group-item question-type" data-type="ShortText" data-label="Respuesta corta" data-icon="text-width" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Respuesta corta
                    </li>
                    <li class="list-group-item question-type" data-type="LongText" data-label="Respuesta larga" data-icon="text-height" draggable="true">
                        <span class="glyphicon glyphicon-text-height" aria-hidden="true"></span>
                        Respuesta larga
                    </li>
                    <li class="list-group-item question-type" data-type="MultipleChoice" data-label="Elección múltiple" data-icon="check"  draggable="true">
                        <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                        Elección múltiple
                    </li>
                    <li class="list-group-item question-type" data-type="MultipleImages" data-label="Múltiples imágenes" data-icon="list-alt" draggable="true">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        Múltiples imágenes
                    </li>
                    <li class="list-group-item question-type" data-type="Dropdown" data-label="Desplegable" data-icon="triangle-bottom" draggable="true">
                        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                        Desplegable
                    </li>
                    <li class="list-group-item question-type" data-type="Grid" data-label="Elección múltiple" data-icon="th"  draggable="true">
                        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                        Cuadricula
                    </li>
                    <li class="list-group-item question-type" data-type="Scale" data-label="Escala de opinión" data-icon="transfer" draggable="true">
                        <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                        Escala de opinión
                    </li>
                    <li class="list-group-item question-type" data-type="Declaration" data-label="Texto" data-icon="pencil" draggable="true">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        Texto
                    </li>
                    <li class="list-group-item question-type" data-type="Number" data-label="Número" data-icon="text-width" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Número
                    </li>
                    <li class="list-group-item question-type" data-type="Email" data-label="Email" data-icon="envelope" draggable="true">
                        <span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        Email
                    </li>
                    <li class="list-group-item question-type" data-type="Web" data-label="Página web" data-icon="globe" draggable="true">
                        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        Página web
                    </li>
                    <li class="list-group-item question-type" data-type="Date" data-label="Fecha" data-icon="calendar" draggable="true">
                        <span class="glyphicon glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        Fecha
                    </li>
                    <li class="list-group-item question-type" data-type="Hour" data-label="Fecha" data-icon="calendar" draggable="true">
                        <span class="glyphicon glyphicon glyphicon-hourglass" aria-hidden="true"></span>
                        Hora
                    </li>
                    <li class="list-group-item question-type" data-type="YesNo" data-label="Si/No" data-icon="text-width" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Si/No
                    </li>
                    <li class="list-group-item question-type" data-type="Legal" data-label="Legal" data-icon="text-width" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Legal
                    </li>
                </ul>
            </div>
            <div class="col-xs-9 form-structure">
                <ul id="form-questions">
                    @foreach($form->questions->sortBy('position') as $question)
                        <li id="question-{{ $question->id }}" class="question-item" data-id="{{ $question->id }}" data-icon="{{ $question->icon }}" data-type="{{ $question->typable_type }}">
                            <div class="question-label-wrapper">
                               <span class="glyphicon glyphicon-{{ $question->icon }}" aria-hidden="true"></span>
                               <span class="question-label">{{ $question->text }}</span>
                            </div>
                            <div class="question-actions">
                               <span class="move-question glyphicon glyphicon-move" aria-hidden="true"></span>
                               <span class="delete-question glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </div>
                        </li>
                    @endforeach
                    <li id="drag-here" @if($form->questions->count() == 0)class="empty"@endif>
                        <span>Añade nuevas preguntas</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Add Question Modal -->
    <div class="modal fade" id="add-question-modal" tabindex="-1" role="dialog" aria-labelledby="addQuestion">
    </div>

    <!-- Edit Question Modal -->
    <div class="modal fade" id="edit-question-modal" tabindex="-1" role="dialog" aria-labelledby="addQuestion">
    </div>

    <!-- Delete Question modal -->
    <div class="modal fade" id="delete-question-modal" tabindex="-1" role="dialog" aria-labelledby="deleteQuestion">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Eliminar pregunta</h4>
                </div>
                <div class="modal-body">
                    <span>¿Desea eliminar la pregunta?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="delete-question-button" type="button" class="btn btn-primary" value="">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>var form_id = "{{$form->id}}"</script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/html.sortable.min.js') }}"></script>
@endsection
