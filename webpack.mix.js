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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
      'resources/css/style.min.css',
      'resources/css/themify-icons.css',
        'resources/css/jquery.dataTables.min.css',
      'resources/css/materialdesignicons.min.css',
      'resources/css/bootstrap-datepicker.css',
      'resources/css/material-design-iconic-font.css',
      'resources/css/daterangepicker.css',
      'resources/css/select2.min.css',
        'resources/css/summernote.css'
      ], 'public/css/all.css')
    .scripts([
        'resources/js/custom.min.js',
        'resources/js/sidebarmenu.js',
        'resources/js/waves.js',
        'resources/js/bootstrap-datepicker.js',
        'resources/js/jquery.dataTables.min.js',
        'resources/js/daterangepicker.js',
        'resources/js/select2.min.js',
        'resources/js/summernote.js',
        'resources/js/signature_pad.min.js',
      ], 'public/js/all.js')
    .scripts(['resources/js/date-eu.js'], 'public/js/date-eu.js')
    .scripts(['resources/js/xlsx.full.min.js'], 'public/js/xlsx.js')
    .postCss('resources/css/appTail.css', 'public/css', [
      require('postcss-import'),
      require('tailwindcss'),
      require('autoprefixer')
    ]);
