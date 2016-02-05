@extends('app')

@section('title')
    | Admin | Usuarios | Edición
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => $user->name])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.components.errors')
            {!! Form::model($user, ['route' => ['Admin::Users::edit_path', $user->id], 'method'=>'PATCH', 'role'=>'form', 'class' => 'form-horizontal']) !!}
                @include('partials.users.form', ['btnText' => 'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection