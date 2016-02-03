@extends('app')

@section('header')
    <div class="jumbotron">
        <div class="container">
            <h1>{{ $project->name }}</h1>
            {!! $project->getDescription() !!}
            @include('partials.progressbar', ['value' => $project->progress])
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if( $project->tasks->count() > 0 )
                <h3>Tareas</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tarea</th>
                        <th>Responsable</th>
                        <th>creada</th>
                        <th>Finalizada</th>
                        <th>-</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->tasks->sortBy('name') as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->responsible->name }}</td>
                            <td>{{ $task->created_at->diffForHumans() }}</td>
                            <td>{!! $task->getIconFinishedStatus() !!}</td>
                            <td>{!! link_to_route('Projects::Tasks::show_path', 'Ver', [$project->id, $task->id], ['class' => 'btn btn-info']) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">
                	<strong>Atención: </strong> Aún no se ha creado ninguna tarea a este proyecto.
                </div>
            @endif
            <a href="{{ route('Projects::Tasks::create_path', [$project->id]) }}" class="btn btn-primary">
                <i class="fa fa-check-square"></i> Crear nueva tarea
            </a>
        </div>
    </div>
@endsection

@section('scripts')
@endsection