@extends('app')

@section('header')
    @include('partials.jumbotron', ['title' => $user->name])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            {!! Form::model($user, ['route' => ['Admin::Users::edit_path', $user->id], 'method'=>'PATCH', 'role'=>'form']) !!}
                @include('admin.users.form', ['btnTexto' => 'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection