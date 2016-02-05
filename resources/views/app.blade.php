<!DOCTYPE html>
<html lang="es">
    @include('partials.layout.headerpage')
<body>

    @include('partials.layout.navbar')

    @yield('header')

    <div class="container">
        @yield('content')
        <hr>
        @include('partials.layout.footer')
    </div>

    <div id="flash-message">
    </div>
    @include('partials.layout.footerpage')
    @include('partials.components.flash-notify')
    @yield('scripts')
</body>
</html>