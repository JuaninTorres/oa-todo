@extends('app')

@section('title')
    | Proyecto | Creación
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Creación de un nuevo Proyecto'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.components.errors')
            {!! Form::open(['route' => 'Projects::create_path', 'method' => 'PUT', 'role' => 'form']) !!}
                @include('projects.partials.form', ['btnText' => 'Crear'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection