<ol class="breadcrumb">
    <li><a href="{{ route('Projects::list_path') }}">Mis Proyectos</a></li>
    <li><a href="{{ route('Projects::show_path', [$project->id]) }}">{{ $project->name }}</a></li>
    <li class="active">{{ $task->name }}</li>
</ol>