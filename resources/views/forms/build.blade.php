@extends('layouts.app')

@section('title')
    {{$form->name}} - Construir | TFG Pablo
@endsection

@section('css')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
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
                            <a href=" {{route('forms.design',['id' => $form->id])}} ">Diseño</a>
                        </li>
                        <li>
                            <a href=" {{route('forms.share',['id' => $form->id])}} ">Compartir</a>
                        </li>
                        <li>
                            <a href=" {{route('forms.analyze',['id' => $form->id])}} ">Analizar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row row-eq-height">
            <div id="question-options" class="col-xs-3 sidebar">
                <ul class="list-group question-types">
                    <li class="list-group-item question-type" data-id="0" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Respuesta corta
                    </li>
                    <li class="list-group-item question-type" data-id="1" draggable="true">
                        <span class="glyphicon glyphicon-text-height" aria-hidden="true"></span>
                        Respuesta larga
                    </li>
                    <li class="list-group-item question-type" data-id="2" draggable="true">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        Texto
                    </li>
                    <li class="list-group-item question-type" data-id="3" draggable="true">
                        <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                        Desplegable
                    </li>
                    <li class="list-group-item question-type" data-id="4" draggable="true">
                        <span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        Email
                    </li>
                    <li class="list-group-item question-type" data-id="5" draggable="true">
                        <span class="glyphicon glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        Fecha
                    </li>
                    <li class="list-group-item question-type" data-id="6" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Legal
                    </li>
                    <li class="list-group-item question-type" data-id="7" draggable="true">
                        <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        Página web
                    </li>
                    <li class="list-group-item question-type" data-id="8" draggable="true">
                        <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                        Elección múltiple
                    </li>
                    <li class="list-group-item question-type" data-id="9" draggable="true">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        Múltiples imágenes
                    </li>
                    <li class="list-group-item question-type" data-id="10" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Si/No
                    </li>
                    <li class="list-group-item question-type" data-id="11" draggable="true">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        Puntación
                    </li>
                    <li class="list-group-item question-type" data-id="12" draggable="true">
                        <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                        Escala de opinión
                    </li>
                    <li class="list-group-item question-type" data-id="13" draggable="true">
                        <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                        Número
                    </li>
                </ul>
            </div>
            <div class="col-xs-9 form-structure">
                <ul id="form-questions" style="padding: 5px" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <li class="drag-here">
                        <div>Arrastra y suelta las preguntas aquí</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>var form_id = "{{$form->id}}"</script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/jquery-sortable-min.js') }}"></script>
@endsection
