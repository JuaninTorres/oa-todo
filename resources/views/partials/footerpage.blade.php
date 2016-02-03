{{--<script src="{{ asset('components/vendor/jquery/dist/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('components/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('components/vendor/sweetalert/dist/sweetalert.min.js') }}"></script>--}}

<script src="{{ elixir('js/all-vendors.js') }}"></script>
<script src="{{ elixir('js/all-footer.js') }}"></script>
@yield('scripts')
@include('flash::message')