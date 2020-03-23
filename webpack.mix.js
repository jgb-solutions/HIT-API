const mix = require('laravel-mix');

mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/popper.js/dist/umd/popper.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/summernote/dist/summernote-bs4.min.js',
    'resources/js/summernote-fr-FR.js',
], 'public/js/vendor.js');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')

