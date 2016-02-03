@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Crear un nuevo usuario</h2>
            @include('partials.errors')
            {!! Form::open(['route' => ['Admin::Users::create_path'], 'method'=>'PUT', 'role'=>'form']) !!}
                @include('admin.users.form', ['btnTexto' => 'Crear'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection