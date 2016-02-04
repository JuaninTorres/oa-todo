@extends('app')

@section('header')
    @include('partials.jumbotron', ['title' => 'Edición: ' . $project->name])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            {!! Form::model($project, ['route' => ['Projects::edit_path', $project->id], 'method' => 'PATCH', 'role' => 'form']) !!}
                @include('projects.partials.form', ['btnText' => 'Actualizar'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection