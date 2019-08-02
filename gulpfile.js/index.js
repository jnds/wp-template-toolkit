'use strict';

const gulp = require('gulp'), 
      livereload = require('gulp-livereload'),
      project = require('../project.config.js'),
      paths = project.paths;

// load all sub tasks
require('require-dir')('./tasks', {recurse: true});


// watch and compile CSS and JS
gulp.task('watch', function () {

    console.log('watching');
    // listen on port 35729
    // make sure this port is used in the browser middleware
    // <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    // see includes/extras/live_reload.php

    livereload.listen(35729);

    // watch .scss files
    console.log('watching css');
    gulp.watch([paths.src.stylesGlob], gulp.series('css'));

    // watch .js files
    console.log('watching js');
    gulp.watch(paths.src.scriptsGlob, gulp.series('js')); //SOURCE_DIR + '/**/*.js'

    // watch .php & .twig files
    console.log('watching php & twig');
    gulp.watch(paths.src.includes, gulp.series('php:includes'));
    gulp.watch(paths.src.controllers, gulp.series('php:controllers'));
    gulp.watch(paths.src.views, gulp.series('php:views'));    
    gulp.watch(paths.base.src+'templates/views/base.twig', gulp.series('php:header'));    

    // watch images
    console.log('watching images');
    gulp.watch(paths.src.images, gulp.series('images'));

    // watch translations
    console.log('watching translationss');
    gulp.watch(paths.src.translations, gulp.series('translations'));

    // watch defaults
    console.log('watching defaults');
    gulp.watch(paths.src.defaults, gulp.series('defaults'));    

});

gulp.task('compile',  gulp.parallel( 'css', 'js', 'php', 'images', 'defaults', 'translations' ) );

// build task 
gulp.task('build', gulp.series('clean', 'compile'));