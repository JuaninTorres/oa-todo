@extends('app')

@section('header')
    @include('partials.jumbotron', ['title' => "Panel de control del administrador"])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('Admin::Users::list_path') }}">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                </span>
                Usuarios
            </a>
        </div>
    </div>
@endsection
