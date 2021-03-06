@extends('app')

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Mis tareas pendientes'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('tasks.partials.list', ['tasks' => $currentUser->unfinishedTasks])
        </div>
    </div>
@endsection

@section('title')
    | Mis tareas pendientes
@endsection