const mix = require('laravel-mix');

mix.react('resources/js/app.js', 'public/js')  
    .css('resources/css/app.css', 'public/css');
