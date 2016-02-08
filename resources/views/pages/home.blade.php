@extends('app')

@section('content')
    @include('partials.components.errors')
    @if( $currentUser )
        <div class="row">
            {{--<div class="col-md-6">--}}
                {{--<h2><a href="{{ route('Projects::list_path') }}">Mis Proyectos</a> <span class="badge">{{ $currentUser->projects->count() }}</span></h2>--}}
                {{--@include('projects.partials.list', ['projects' => $currentUser->projects])--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<h2><a href="{{ route('Projects::list_path' ) }}">Mis tareas pendientes</a> <span class="badge">{{ $currentUser->unfinishedTasks->count() }}</span></h2>--}}
                {{--@include('tasks.partials.list', ['tasks' => $currentUser->unfinishedTasks])--}}
            {{--</div>--}}
            <div class="col-md-6">
                <div class="panel panel-primary">
                	  <div class="panel-heading">
                          <h3 class="panel-title">
                              <a href="{{ route('Projects::list_path') }}">Mis Proyectos</a> <span class="badge">{{ $currentUser->projects->count() }}</span>
                          </h3>
                      </div>
                	  <div class="panel-body">
                          @include('projects.partials.list', ['projects' => $currentUser->projects])
                          <a href="{{ route('Projects::create_path') }}" class="btn btn-primary">
                              <i class="fa fa-plus"></i> Crear nuevo proyecto</a>
                	  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="{{ route('Tasks::list_path' ) }}">Mis tareas pendientes</a> <span class="badge">{{ $currentUser->unfinishedTasks->count() }}</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        @include('tasks.partials.list', ['tasks' => $currentUser->unfinishedTasks])
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('header')
    @include('partials.components.header')
@endsection

