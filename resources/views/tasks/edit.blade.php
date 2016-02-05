@extends('app')

@section('title')
    | Tareas | Edición: {{ $task->name }}
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Edición: ' . $task->name, 'content' => 'Proyecto: ' . $project->name])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.components.errors')
            {!! Form::model($task, ['route' => ['Projects::Tasks::edit_path', $project->id, $task->id], 'method' => 'PATCH', 'role'=>'form', 'class' => 'form-horizontal']) !!}
                @include('tasks.partials.form', ['btnText' => 'Actualizar', 'users' => $users])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection