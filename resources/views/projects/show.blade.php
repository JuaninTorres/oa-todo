@extends('app')

@section('title')
    | Proyecto | {{ $project->name }}
@endsection

@section('header')
    <div class="jumbotron">
        <div class="container">
            @include('partials.components.headeranimated', ['title' => $project->name])
            @include('partials.components.progressbar', ['value' => $project->progress])
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('projects.partials.breadcrumb', compact('project'))
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
            	  <div class="panel-heading">
            			<h3 class="panel-title">Descripción</h3>
            	  </div>
            	  <div class="panel-body">
                      {!! $project->getDescription() !!}
            	  </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('tasks.partials.listdetailed', compact('project'))
            @can('update', $project)
                <a href="{{ route('Projects::Tasks::create_path', [$project->id]) }}" class="btn btn-primary">
                    <i class="fa fa-check-square"></i> Crear nueva tarea
                </a>
                <a href="{{ route('Projects::edit_path', [$project->id]) }}" class="btn btn-info">
                    <i class="fa fa-pencil"></i> Editar el proyecto
                </a>
            @endcan
        </div>
    </div>
@endsection

@section('scripts')
@endsection