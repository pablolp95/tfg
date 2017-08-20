<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                TFG Pablo
            </a>
        </div>

        <!-- Left Side Of Navbar -->
        <div class="nav navbar-nav navbar-left">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn" data-toggle="tooltip" data-placement="bottom" title="Espacios de trabajo">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span id="workspace-counter">{{ Auth::user()->workspaces->count() }}</span>
            </button>
        </div>

        <!-- Right Side Of Navbar -->
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar Holder -->
<nav id="sidebar">
    <div id="sidebar-wrapper">
        <div class="sidebar-header">
            <div id="dismiss">
                <i class="glyphicon glyphicon-arrow-left"></i>
            </div>
            <h3>Espacios de trabajo</h3>
            <div class="divisor"></div>
        </div>
        <div id="workspace-links">
            <ul class="list-unstyled">
                @foreach(Auth::user()->workspaces as $workspace_item)
                    <li class="workspace-item @if($workspace->id == $workspace_item->id) active @endif" value="{{$workspace_item->id}}">
                        <div class="workspace-item-wrapper">
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            <span>{{ $workspace_item->name }}</span>
                            <div class="workspace-actions">
                                <span class="delete-workspace glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></span>
                                <span class="badge">{{ $workspace_item->forms->count() }}</span>
                            </div>
                            <div class="divisor"></div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div id="add-workspace">
            <button type="button" id="add-workspace-button" class="btn btn-info navbar-btn" data-toggle="modal" data-target="#add-workspace-modal">
                <span>Añadir un espacio de trabajo</span>
            </button>
        </div>
    </div>
</nav>

<div class="overlay"></div>

<!-- Add workspace modal -->
<div class="modal fade" id="add-workspace-modal" tabindex="-1" role="dialog" aria-labelledby="addWorkspace">
    <div class="modal-dialog" role="document">
        {!! Form::open(["method" => "post", "route" => "workspaces.store"]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Añadir un nuevo espacio de trabajo</h4>
            </div>
            <div class="modal-body">
                <input id="name" class="form-control" name="name" placeholder="Introduzca el nombre..." autofocus="" type="text">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- Delete workspace modal -->
<div class="modal fade" id="delete-workspace-modal" tabindex="-1" role="dialog" aria-labelledby="deleteWorkspace">
    <div class="modal-dialog" role="document">
        {!! Form::open(["method" => "delete", "id" => "delete-workspace-form"]) !!}
            <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title">Eliminar espacio de trabajo</h4>
                </div>
                <div class="modal-body">
                   <span>¿Desea eliminar el espacio de trabajo?</span>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

