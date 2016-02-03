var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
            'vendor/jquery/dist/jquery.js',
            'vendor/bootstrap/dist/js/bootstrap.js',
            'vendor/sweetalert/dist/sweetalert.min.js',
        ], 'public/js/all-vendors.js', 'public')
        .scripts([
            'ajax-helpers.js',
            'app.js'
        ], 'public/js/all-footer.js')
        .version([
            'css/app.css',
            'js/all-vendors.js',
            'js/all-footer.js'
        ]);
});
