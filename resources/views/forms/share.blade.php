@extends('layouts.app')

@section('title')
    {{$form->name}} - Compartir | TFG Pablo
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
                        <li class="active">
                            <a href=" {{route('forms.share',['id' => $form->id])}} ">Compartir</a>
                        </li>
                        <li>
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
            <div class="col-xs-12 share-wrapper">
                <div class="share-form">
                    <label>Tu formulario se aloja en esta URL:</label>
                    <input value="{{ url('/view/form/'.$form->id) }}" readonly="" type="text">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>var form_id = {{$form->id}}</script>
    <script src="{{ asset('js/form.js') }}"></script>
@endsection
