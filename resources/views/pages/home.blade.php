@extends('app')

@section('content')
    @include('partials.errors')
    @if( $currentUser )
        <div class="row">
            <div class="col-md-6">
                <h2>Mis Proyectos <span class="badge">{{ $currentUser->projects->count() }}</span></h2>
                @include('projects.partials.list', ['projects' => $currentUser->projects])
            </div>
            <div class="col-md-6">
                <h2>Mis Tareas <span class="badge">{{ $currentUser->unfinishedTasks->count() }}</span></h2>
                @include('tasks.partials.list', ['tasks' => $currentUser->unfinishedTasks])
            </div>
        </div>
    @endif
@endsection

@section('header')
    @include('partials.header')
@endsection

