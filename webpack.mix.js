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

 mix.sass('resources/sass/vendor.scss', 'public/css')
 .scripts(['node_modules/jquery/dist/jquery.min.js', 'node_modules/@coreui/utils/dist/coreui-utils.js', 'node_modules/axios/dist/axios.min.js', 'node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js'], 'public/js/vendor.js')
 .js('resources/js/app.js', 'public/js')
     .sass('resources/sass/app.scss', 'public/css')
     .sourceMaps();

