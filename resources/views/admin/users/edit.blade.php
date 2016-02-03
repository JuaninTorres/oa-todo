@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $user->name }}</h2>
            @include('partials.errors')
            {!! Form::model($user, ['route' => ['Admin::Users::edit_path', $user->id], 'method'=>'PATCH', 'role'=>'form']) !!}
                @include('admin.users.form', ['btnTexto' => 'Guardar'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
@endsection