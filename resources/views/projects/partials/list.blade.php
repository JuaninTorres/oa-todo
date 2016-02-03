@if( $projects->count() > 0 )
    <table class="table table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-list-alt"></i> Proyecto</th>
                <th>Progreso</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>
                    <a href="{{ route('Projects::show_path', [$project->id]) }}">
                        {{ $project->name }}
                    </a>
                </td>
                <td>@include('partials.progressbar', ['value' => $project->progress])</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-warning">
        <strong>Importante: </strong>Aún no ha creado ningún proyecto
    </div>
@endif