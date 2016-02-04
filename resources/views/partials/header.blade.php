<div class="jumbotron">
    <div class="container">
        @if( ! $currentUser )
            @include('partials.headeranimated', ['title' => "Sistema de administración de Tareas"])
            <p>Con la finalidad de poder llevar un mejor control de las labores que realizamos, haremos uso de este sencillo sistema que nos ayudará a coordinarnos.</p>
            <p>Para tener una cuenta de acceso, póngase en contacto con el admin.</p>
        @else
            @include('partials.headeranimated', ['title' => "OA Todo"])
            <p>Sistema de administración de Tareas</p>
        @endif
    </div>
</div>
