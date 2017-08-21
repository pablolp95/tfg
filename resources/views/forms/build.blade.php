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
            <div class="col-xs-3 sidebar">

            </div>
            <div class="col-xs-9 form-structure">

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>var form_id = {{$form->id}}</script>
    <script src="{{ asset('js/form.js') }}"></script>
@endsection
