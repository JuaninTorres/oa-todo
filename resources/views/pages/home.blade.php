@extends('app')

@section('content')
    @include('partials.errors')
    @if( $currentUser )
        <div class="row">
            <div class="col-md-6">
                <h2>Mis Proyectos</h2>
                @include('projects.partials.list', ['projects' => $currentUser->projects])
            </div>
            <div class="col-md-6">
                <h2>Mis Tareas</h2>
                @include('tasks.partials.list', ['tasks' => $currentUser->unfinishedTasks])
            </div>
        </div>
    @endif
@endsection

@section('header')
    @if( ! $currentUser )
        @include('partials.header')
    @endif
@endsection



