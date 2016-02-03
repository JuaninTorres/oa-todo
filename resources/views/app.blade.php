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

    @include('partials.footerpage')
    @yield('scripts')
</body>
</html>