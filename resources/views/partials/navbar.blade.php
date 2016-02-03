<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home_path') }}">OA Todo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            @if( $currentUser )
                <ul class="nav navbar-nav">
                    @if( $currentUser->isAdmin() )
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to_route('Admin::index_path', 'Panel de control') }}</li>
                                <li>{{ link_to_route('Admin::Users::list_path', 'Usuarios') }}</li>
                                <li>{{ link_to_route('Admin::Users::create_path', 'Crear nuevo usuario') }}</li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proyectos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>{{ link_to_route('Projects::list_path', 'Mis proyectos') }}</li>
                            <li>{{ link_to_route('Projects::create_path', 'Crear nuevo proyecto') }}</li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tareas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>{{ link_to_route('Tasks::list_path', 'Mis tareas') }}</li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-hand-spock-o"></i> {{ $currentUser->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                {{ link_to_route('logout_path', 'Salir') }}
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                @include('partials.formlogin')
            @endif
        </div><!--/.navbar-collapse -->
    </div>
</nav>