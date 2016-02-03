@if( $tasks->count() > 0 )
    <table class="table table-hover">
        <thead>
        <tr>
            <th><i class="fa fa-check-square"></i> Tarea</th>
            <th><i class="fa fa-list-alt"></i> Proyecto</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>
                    <a href="{{ route('Projects::Tasks::show_path', [$task->project->id, $task->id]) }}">
                        {{ $task->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('Projects::show_path', [$task->project->id]) }}">
                    {{ $task->project->name }}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-warning">
        <strong>Importante: </strong>Aún no se ha creado ni asignado ninguna tarea
    </div>
@endif