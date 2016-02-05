@extends('app')

@section('title')
    | Proyecto | Edición: {{ $project->name }}
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Edición: ' . $project->name])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.components.errors')
            {!! Form::model($project, ['route' => ['Projects::edit_path', $project->id], 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('projects.partials.form', ['btnText' => 'Actualizar'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection