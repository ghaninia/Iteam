const mix = require('laravel-mix');

// / start css

// mix.combine( [
//     "resources/assets/css/font/*.css" ,
//     "resources/assets/css/vendor/*.css" ,
// ] , "public/assets/css/vendor.css") ;

mix.combine( [
    "resources/assets/css/main.css"
] , "public/assets/css/main.css") ;

// mix.copy('resources/assets/css/font/fonts', 'public/assets/css/fonts', false) ;
// mix.copy('resources/assets/css/color', 'public/assets/css/color', false) ;
// mix.copy('resources/assets/img', 'public/assets/img', false) ;

// start javascript
mix.react('resources/assets/js/component' , 'public/assets/js/component.js') ;
