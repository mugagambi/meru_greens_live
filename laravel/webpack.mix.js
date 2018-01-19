let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/font-awesome.css',
    'public/css/custom-fonts.css',
    'public/css/theme.css',
    'public/css/animate.css',
    'public/css/style.css',
    'public/skins/green.css',
    'public/css/bg10.css'
], 'public/css/styles.css');
mix.styles([
    'public/admin/css/bootstrap.css',
    'public/admin/css/font-awesome.css',
    'public/admin/css/ionicons.css',
    'public/admin/css/AdminLTE.css',
    'public/admin/css/skin-green.css'
], 'public/admin/css/admin.css');
mix.styles([
    'public/admin/css/bootstrap.css',
    'public/admin/css/font-awesome.css',
    'public/admin/css/ionicons.css',
    'public/admin/css/AdminLTE.css'
], 'public/admin/css/admin_login.css');
mix.styles([
    'public/css/cart.css'
], 'public/css/cart.min.css');
mix.scripts([
    'public/js/jquery.min.js',
    'public/js/modernizr.custom.js',
    'public/js/jquery.easing.1.3.js',
    'public/js/bootstrap.min.js',
    'public/js/jquery.flexslider-min.js',
    'public/js/flexslider.config.js',
    'public/js/jquery.appear.js',
    'public/js/js/classie.js',
    'public/js/uisearch.js',
    'public/js/animate.js',
    'public/js/custom.js',
    'public/js/contactform.js'
], 'public/js/scripts.js');
mix.scripts([
    'public/admin/js/jquery.js',
    'public/admin/js/bootstrap.js',
    'public/admin/js/fastclick.js',
    'public/admin/js/adminlte.js',
    'public/admin/js/jquery.slimscroll.js'
], 'public/admin/js/admin.js');
mix.scripts([
    'public/admin/js/jquery.js',
    'public/admin/js/bootstrap.js'
], 'public/admin/js/admin_login.js');