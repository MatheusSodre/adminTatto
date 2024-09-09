let mix = require('laravel-mix');

mix.js('resources/css/app.js', 'dist').setPublicPath('public/css')
    .postCss('resources/css/app.css', 'public/css', []);
