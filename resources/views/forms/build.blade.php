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
    <div id="container-aux" class="container-fluid container-full-height">
        <div class="row row-eq-height row-full-height">
            <div class="col-xs-3 sidebar"></div>
            <div class="col-xs-9 form-structure"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-xs-3">
                <div class="row">
                    <div class="col-xs-12" style="padding-right: 0">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Respuesta corta</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-height" aria-hidden="true"></span>
                            <span>Respuesta larga</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <span>Texto</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                            <span>Desplegable</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            <span>Email</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            <span>Fecha</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Legal</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <span>Página web</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                            <span>Elección múltiple</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                            <span>Grupo</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Si/No</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span>Puntuación</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                            <span>Escala de opinión</span>
                        </button>
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Número</span>
                        </button>
                    </div>
                </div>
                <!--<ul class="list-unstyled">
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Respuesta corta</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-height" aria-hidden="true"></span>
                            <span>Respuesta larga</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <span>Texto</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                            <span>Desplegable</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            <span>Email</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            <span>Fecha</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Legal</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                            <span>Página web</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                            <span>Elección múltiple</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                            <span>Grupo</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Si/No</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <span>Puntuación</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                            <span>Escala de opinión</span>
                        </button>
                    </li>
                    <li class="question-btn-item">
                        <button type="button" class="btn btn-default btn-question">
                            <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>
                            <span>Número</span>
                        </button>
                    </li>
                </ul>-->
            </div>
            <div class="col-xs-9 form-structure">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>var form_id = "{{$form->id}}"</script>
    <script src="{{ asset('js/form.js') }}"></script>
@endsection
