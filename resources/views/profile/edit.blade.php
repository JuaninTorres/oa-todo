@extends('app')

@section('title')
    | Perfil de usuario
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Perfil de usuario'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.components.errors')
            {!! Form::model($user, ['route' => 'profile_path', 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                @include('partials.users.form', ['btnText' => 'Actualizar'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection