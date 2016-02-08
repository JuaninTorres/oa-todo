@extends('app')

@section('title')
    | Admin | Usuarios
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => "Usuarios"])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>-</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{!! link_to_route('Admin::Users::edit_path', 'Editar', [$user->id], ['class' => 'btn btn-info']) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('Admin::Users::create_path') }}" class="btn btn-primary">
                <i class="fa fa-user"></i> Crear nuevo usuario</a>
        </div>
    </div>
@endsection