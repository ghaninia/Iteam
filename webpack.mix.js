const mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/assets/js');

mix.styles([
        'resources/assets/css/fonts.css' ,
        'resources/assets/css/main.css'
    ], 'public/assets/css/app.css');
