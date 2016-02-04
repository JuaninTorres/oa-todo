@extends('app')

@section('header')
    @include('partials.jumbotron', ['title' => 'Edicion: ' . $task->name, 'content' => $project->name])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            {!! Form::model($task, ['route' => ['Projects::Tasks::edit_path', $project->id, $task->id], 'method' => 'PATCH', 'role'=>'form']) !!}
                @include('tasks.partials.form', ['btnText' => 'Actualizar', 'users' => $users])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection