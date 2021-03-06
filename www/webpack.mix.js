const mix = require('laravel-mix');

require('laravel-mix-tailwind');
require('laravel-mix-purgecss');

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

mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');

mix.react('resources/app-react/js/app.js', 'public/js/react')
    .sass('resources/app-react/sass/app.scss', 'public/css/react')
    .purgeCss()
    .tailwind('tailwind.config.js')
    .webpackConfig({
        externals: [
            'child_process'
        ],
        node: {
            fs: 'empty'
        }
    }).sourceMaps();
