@extends('app')

@section('title')
    | Admin | Usuarios | Creación
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Creación de un nuevo usuario'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.components.errors')
            {!! Form::open(['route' => ['Admin::Users::create_path'], 'method'=>'PUT', 'role'=>'form', 'class' => 'form-horizontal']) !!}
                @include('partials.users.form', ['btnText' => 'Crear'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection