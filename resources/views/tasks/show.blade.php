@extends('app')

@section('header')
    <div class="jumbotron">
        <div class="container">
            @include('partials.headeranimated', ['title' => $task->name])
            @can('update', $task)
                @if( ! $task->finished )
                    {!! Form::open(['route' => ['Projects::Tasks::finish_path', $project->id, $task->id], 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-inline']) !!}
                        <button type="submit" class="btn btn-success btn-lg" data-confirm="¿Está seguro de querer finalizar esta tarea?">
                            Finalizar
                        </button>
                    {!! Form::close() !!}
                @endif
            @endcan
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Descripción</h3>
                </div>
                <div class="panel-body">
                    {!! $task->getDescription() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Configuración</h3>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Creación</dt>
                        <dd>{{ $task->created_at->diffForHumans() }}</dd>
                        <dt>Última actualización</dt>
                        <dd>{{ $task->updated_at->diffForHumans() }}</dd>
                        <dt>Responsable</dt>
                        <dd>{{ $task->responsible->name }}</dd>
                        <dt>Finalizada</dt>
                        <dd>{!! $task->getIconFinishedStatus() !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    @can('update', $task)
        @if( ! $task->finished )
            <div class="row">
                <div class="col-md-12">
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