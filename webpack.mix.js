const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix
 .js('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')

 .sass('resources/views/scss/style.scss', 'public/css/style.css')

 .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css/bootstrap.scss')

 .js('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js')