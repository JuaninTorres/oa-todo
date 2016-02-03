@extends('app')

@section('header')
    @include('partials.jumbotron', ['title' => 'Creación de un nuevo Proyecto'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            {!! Form::open(['route' => 'Projects::create_path', 'method' => 'PUT', 'role' => 'form']) !!}
                @include('projects.partials.form', ['btnText' => 'Crear'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection