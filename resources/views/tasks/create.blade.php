@extends('app')

@section('title')
    | Tareas | Creación
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Creación de una nueva tarea', 'content' => $project->name])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.components.errors')
            {!! Form::open(['route' => ['Projects::Tasks::create_path', $project->id], 'method' => 'PUT', 'role'=>'form', 'class' => 'form-horizontal']) !!}
                @include('tasks.partials.form', ['btnText' => 'Crear', 'users' => $users])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection