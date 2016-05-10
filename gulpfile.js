var elixir = require('laravel-elixir');
var gulp = require('gulp');
var fs = require('fs');
var del = require('del');
var task = elixir.Task;


require('laravel-elixir-jade');

require('elixir-juice'); 

elixir.extend('prioritiseJquery', function(message) {

    new task('prioritiseJquery', function() {
        fs.rename("./resources/assets/vendor/jquery", "./resources/assets/vendor/0jquery");
    });

});


elixir(function(mix) {
    mix.sass('main.scss').scripts('main.js');
    mix.copy('./resources/bower_components/font-awesome/fonts', 'public/fonts');
    mix.copy('./resources/assets/js/modernizr.js', 'public/js')

    mix.jade({
        src: '/assets/jade/',
        dest: '/views/static/',
        search: ['*.jade'],
    });

    del.sync('./resources/assets/vendor');

     mix.bower({
        src: './resources/bower_components',
        output: './resources/assets/vendor'
    }).prioritiseJquery();


    mix.scripts('./resources/assets/vendor/**/*.js', 'public/js/vendor.js');
    mix.styles('./resources/assets/vendor/**/*.css', 'public/css/vendor.css');

    mix.browserSync({proxy: 'sitopubblico.dev:80'});
});

