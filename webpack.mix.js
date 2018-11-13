const mix = require('laravel-mix');

mix.js('resources/assets/js/app.js' , 'public/assets/js/app.js');

mix.styles([
        'resources/assets/css/main.css' ,
    ], 'public/assets/css/app.css');

mix.styles([
    'resources/assets/css/plugins.css' ,
    'resources/assets/css/animate.css'
], 'public/assets/css/plugins.css');

mix.styles(['resources/assets/css/fonts.css' ,], 'public/assets/css/fonts.css');

mix.styles([
    'resources/assets/css/fonts.css' ,
    'resources/assets/css/plugins.css' ,
    'resources/assets/css/auth.css' ,
], 'public/assets/css/auth.css');
