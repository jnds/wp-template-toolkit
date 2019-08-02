var gulp = require('gulp'),
	  uglify = require('gulp-uglify'),
	  include = require('gulp-include'), // could also use browserify
	  livereload = require('gulp-livereload'),
 	  project = require('../../project.config.js'),
 	  paths = project.paths;
 	  // concat = require('gulp-concat')

// concatenate and uglify JS
gulp.task('js', function () {

    return gulp.src([paths.src.scripts]) // SOURCE_DIR + '/js/*.js', '!' + SOURCE_DIR + '/js/_*.js'
        .pipe(include())
        .pipe(gulp.dest(paths.base.theme + paths.dest.scripts))
        .pipe(uglify())
        .on('error', function (err) { gutil.log(gutil.colors.red('[Error]'), err.toString()); })
        .pipe(gulp.dest(paths.base.theme + paths.dest.scripts))
        .pipe(livereload());

});