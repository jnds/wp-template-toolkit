const gulp = require('gulp'),
      sass = require('gulp-sass'),
      autoprefixer = require('gulp-autoprefixer'),
      // sourcemaps = require('gulp-sourcemaps'),
      livereload = require('gulp-livereload'),
      project = require('../../project.config.js'),
      paths = project.paths;

// concatenate and minify css   
gulp.task('css', function () {

    return gulp.src(paths.src.styles)
    //.pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed', errLogToConsole: true}).on('error', sass.logError))
    // .pipe(sourcemaps.write({includeContent: false})) //, sourceRoot: scssFiles
    // .pipe(sourcemaps.init({loadMaps: true}))
    // .pipe(sourcemaps.write('../maps')) //, {sourceRoot: scssFiles}
    .pipe(autoprefixer())
    .pipe(gulp.dest(paths.base.theme + paths.dest.styles))
    .pipe(livereload());
});
