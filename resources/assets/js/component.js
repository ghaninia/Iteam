window._ = require('lodash');
const options = options ;

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

Snackbar = require("node-snackbar") ;
NProgress = require("nprogress") ;
SimpleReactValidator  = require("simple-react-validator") ;

// components list
require('./pages/Auth');
require("./pages/profile/Account") ;