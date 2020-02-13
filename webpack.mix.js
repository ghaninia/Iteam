const mix = require('laravel-mix');

// / start css

mix.combine( [
    "resources/assets/librarys/css/vendor/*.css"
] , "public/assets/librarys/css/vendor/app.css") ;

mix.combine( [
    "resources/assets/librarys/css/app.css"
] , "public/assets/librarys/css/app.css") ;

mix.copy('resources/assets/librarys/fonts', 'public/assets/librarys/fonts', false) ;
mix.copy('resources/assets/librarys/css/color', 'public/assets/librarys/css/color', false) ;
mix.copy('resources/assets/librarys/img', 'public/assets/librarys/img', false) ;

// start auth
mix.react('resources/assets/auth/js/app.js' , 'public/assets/auth/js/app.js') ;

// dashboard js
mix.js("resources/assets/dashboard/js/app" , 'public/assets/dashboard/js/app.js') ;
