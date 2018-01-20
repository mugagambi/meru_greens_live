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
    '../public_html/css/bootstrap.min.css',
    '../public_html/css/font-awesome.css',
    '../public_html/css/custom-fonts.css',
    '../public_html/css/theme.css',
    '../public_html/css/animate.css',
    '../public_html/css/style.css',
    '../public_html/skins/green.css',
    '../public_html/css/bg10.css'
], '../public_html/css/styles.css');
mix.styles([
    '../public_html/admin/css/bootstrap.css',
    '../public_html/admin/css/font-awesome.css',
    '../public_html/admin/css/ionicons.css',
    '../public_html/admin/css/AdminLTE.css',
    '../public_html/admin/css/skin-green.css'
], '../public_html/admin/css/admin.css');
mix.styles([
    '../public_html/admin/css/bootstrap.css',
    '../public_html/admin/css/font-awesome.css',
    '../public_html/admin/css/ionicons.css',
    '../public_html/admin/css/AdminLTE.css'
], '../public_html/admin/css/admin_login.css');
mix.styles([
    '../public_html/css/cart.css'
], '../public_html/css/cart.min.css');
mix.scripts([
    '../public_html/js/jquery.min.js',
    '../public_html/js/modernizr.custom.js',
    '../public_html/js/jquery.easing.1.3.js',
    '../public_html/js/bootstrap.min.js',
    '../public_html/js/jquery.flexslider-min.js',
    '../public_html/js/flexslider.config.js',
    '../public_html/js/jquery.appear.js',
    '../public_html/js/js/classie.js',
    '../public_html/js/uisearch.js',
    '../public_html/js/animate.js',
    '../public_html/js/custom.js',
    '../public_html/js/contactform.js'
], '../public_html/js/scripts.js');
mix.scripts([
    '../public_html/admin/js/jquery.js',
    '../public_html/admin/js/bootstrap.js',
    '../public_html/admin/js/fastclick.js',
    '../public_html/admin/js/adminlte.js',
    '../public_html/admin/js/jquery.slimscroll.js'
], '../public_html/admin/js/admin.js');
mix.scripts([
    '../public_html/admin/js/jquery.js',
    '../public_html/admin/js/bootstrap.js'
], '../public_html/admin/js/admin_login.js');