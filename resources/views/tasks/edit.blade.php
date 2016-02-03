@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $task->name }}</h2>
            @include('partials.errors')
            {!! Form::model($task, ['route' => ['Projects::Tasks::edit_path', $project->id, $task->id], 'method' => 'PATCH', 'role'=>'form']) !!}
                @include('tasks.partials.form', ['btnText' => 'Actualizar', 'users' => $users])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection