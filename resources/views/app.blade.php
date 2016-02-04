<!DOCTYPE html>
<html lang="es">
    @include('partials.headerpage')
<body>

    @include('partials.navbar')

    @yield('header')

    <div class="container">
        @yield('content')
        <hr>
        @include('partials.footer')
    </div> <!-- /container -->

    <div id="flash-message" class="Alert Alert--Success animate" role="alert">
        Lo que sea que se me ocurra colocar
    </div>
    @include('partials.footerpage')
    @include('partials.flash-notify')
    @yield('scripts')
</body>
</html>