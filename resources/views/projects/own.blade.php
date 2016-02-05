@extends('app')

@section('title')
    | Mis Proyectos
@endsection

@section('header')
    @include('partials.components.jumbotron', ['title' => 'Mis Proyectos'])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('projects.partials.list', ['projects' => $currentUser->projects])
            <a href="{{ route('Projects::create_path') }}" class="btn btn-primary">
                <i class="fa fa-list-alt"></i> Crear nuevo proyecto
            </a>
        </div>
    </div>
@endsection

@section('scripts')
@endsection