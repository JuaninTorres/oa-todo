@extends('app')

@section('title')
    | Tareas | {{ $task->name }}
@endsection

@section('header')
    <div class="jumbotron">
        <div class="container">
            @include('partials.components.headeranimated', ['title' => $task->name])
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('tasks.partials.breadcrumb', compact('project', 'task'))
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('tasks.partials.description', compact('task'))
        </div>
        <div class="col-md-6">
            @include('tasks.partials.configuration', compact('task'))
        </div>
    </div>
    @can('update', $task)
        @if( ! $task->finished )
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::open(['route' => ['Projects::Tasks::finish_path', $project->id, $task->id], 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-inline']) !!}
                        <button type="submit" class="btn btn-success" data-confirm="¿Está seguro de querer finalizar esta tarea?">
                            <i class="fa fa-check"></i> Finalizar
                        </button>
                        {!! Form::close() !!}

                    </div>
                    <a href="{{ route('Projects::Tasks::edit_path', [$project->id, $task->id]) }}" class = "btn btn-info">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                </div>
            </div>
        @endif
    @endcan
@endsection

@section('scripts')
@endsection