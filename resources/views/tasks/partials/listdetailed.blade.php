@if( $project->tasks->count() > 0 )
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Tareas</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Tarea</th>
                    <th>Responsable</th>
                    <th>creada</th>
                    <th>Finalizada</th>
                </tr>
                </thead>
                <tbody>
                @foreach($project->tasks->sortBy('name') as $task)
                    <tr>
                        <td>
                            <a href="{{route('Projects::Tasks::show_path', [$project->id, $task->id])}}">
                                {{ $task->name }}
                            </a>
                        </td>
                        <td>{{ $task->responsible->name }}</td>
                        <td>{{ $task->created_at->diffForHumans() }}</td>
                        <td>{!! $task->getIconFinishedStatus() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <div class="alert alert-warning">
        <strong>Atención: </strong> Aún no se ha creado ninguna tarea a este proyecto.
    </div>
@endif