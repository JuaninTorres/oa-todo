@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Usuarios</h2>
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
        </div>
    </div>
@endsection