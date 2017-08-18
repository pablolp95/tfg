@extends('layouts.app')

@section('title')
    {{$workspace->name}} - Formularios | TFG Pablo
@endsection

@section('css')
    <link href="{{ asset('css/workspace.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="form-layout" class="container">
        <div class="row row-eq-height row-full-height">
            <div id="form-wrapper" class="col-md-9">
                <ul id="forms">
                    <li id="add-form" class="form-thumbnail" data-toggle="modal" data-target="#add-form-modal">
                        <div class="form-caption">
                            <span>Añadir formulario</span>
                        </div>
                    </li>
                    @foreach($workspace->forms as $form)
                        <li class="form-thumbnail form-item" value="{{$form->id}}">
                            <div class="form-caption">
                                <span>{{$form->name}}</span>
                            </div>
                            <div class="form-actions">
                                <span class="view-stats-form glyphicon glyphicon-stats form-action" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Métricas"></span>
                                <span class="delete-form glyphicon glyphicon-trash form-action" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div id="members-sidebar" class="col-md-3">
                2 of 3
            </div>
        </div>

        <!-- Add form modal -->
        <div class="modal fade" id="add-form-modal" tabindex="-1" role="dialog" aria-labelledby="addForm">
            <div class="modal-dialog" role="document">
                {!! Form::open(["method" => "post", "route" => "forms.store"]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Añadir un nuevo formulario</h4>
                    </div>
                    <div class="modal-body">
                        <input id="name" class="form-control" name="name" placeholder="Introduzca el nombre..." autofocus="" type="text">
                        <input id="workspace_id" name="workspace_id" value="{{$workspace->id}}" type="hidden">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <!-- Delete form modal -->
        <div class="modal fade" id="delete-form-modal" tabindex="-1" role="dialog" aria-labelledby="deleteForm">
            <div class="modal-dialog" role="document">
                {!! Form::open(["method" => "delete", "id" => "delete-form"]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Eliminar formulario</h4>
                    </div>
                    <div class="modal-body">
                        <span>¿Desea eliminar el formulario?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
