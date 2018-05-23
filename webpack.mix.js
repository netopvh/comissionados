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

mix.js('resources/assets/js/app.js', 'public/js');

mix.copyDirectory('resources/assets/template/icons/fontawesome/fonts','public/css/fonts');
mix.copyDirectory('resources/assets/template/icons/glyphicons','public/css/fonts');
mix.copyDirectory('resources/assets/template/icons/icomoon/fonts','public/css/fonts');
mix.copyDirectory('resources/assets/template/icons/summernote','public/css/fonts');
mix.copyDirectory('resources/assets/template/images','public/css/images');
mix.copy('resources/assets/template/icons/icomoon/styles.css','public/css/icomoon.min.css');
mix.copy('resources/assets/template/js/pages/layout_fixed_custom.js','public/js/layout.js');

mix.less('resources/assets/template/less/_main_full/bootstrap.less','public/css',{
    relativeUrls:true,
    compress:true,
}).options({
    processCssUrls: false
}).version();
mix.less('resources/assets/template/less/_main_full/core.less','public/css',{
    relativeUrls:true,
    compress:true,
}).options({
    processCssUrls: false
}).version();
mix.less('resources/assets/template/less/_main_full/components.less','public/css',{
    relativeUrls:true,
    compress:true,
}).options({
    processCssUrls: false
}).version();
mix.less('resources/assets/template/less/_main_full/colors.less','public/css',{
    relativeUrls:true,
    compress:true,
}).options({
    processCssUrls: false
}).version();

mix.js([
    'resources/assets/template/js/core/app.js',
],'public/js/bundle.js')
    .version();
