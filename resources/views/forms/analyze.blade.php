@extends('layouts.app')

@section('title')
    {{$form->name}} - Analizar | TFG Pablo
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
                        <li>
                            <a href=" {{route('forms.show',['id' => $form->id])}} ">Construir</a>
                        </li>
                        <li>
                            <a href=" {{route('forms.share',['id' => $form->id])}} ">Compartir</a>
                        </li>
                        <li class="active">
                            <a href=" {{route('forms.analyze',['id' => $form->id])}} ">Analizar</a>
                        </li>
                    </ul>
                </div>
                <div id="show-form">
                    <a href="{{ url('/view/form/'.$form->id) }}" target="_blank">Ver formulario</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="container-aux" class="container-fluid container-full-height">
        <div class="row row-eq-height row-full-height">
            <div class="col-xs-12 analyze-wrapper"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-xs-12 analyze-wrapper">
                <div class="row" style="margin-top: 10px">
                    <div class="col-xs-8 col-xs-offset-2 analyze-control">
                        <h3>{{$form->responses->count()}} respuestas</h3>
                        <div class="btn-group" role="group">
                            <button id="summary" type="button" class="selected btn btn-default button-control-analyze">RESUMEN</button>
                            <button id="single" type="button" class="btn btn-default button-control-analyze">INDIVIDUAL</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="analyze-content" class="col-xs-8 col-xs-offset-2" style="margin-bottom: 20px">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>var form_id = {{$form->id}}</script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/analyze.js') }}"></script>
@endsection
