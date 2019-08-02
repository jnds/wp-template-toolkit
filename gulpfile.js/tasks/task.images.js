var gulp = require('gulp'),
 	imagemin = require('gulp-imagemin'),
 	pngquant = require('imagemin-pngquant'),
 	livereload = require('gulp-livereload'),
 	project = require('../../project.config.js'),
 	paths = project.paths;

// minify Images
gulp.task('images', function () {
    return gulp.src(paths.src.images)
        .pipe(imagemin([
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.jpegtran({progressive: true})
        ]))
        .pipe(gulp.dest(paths.base.theme + paths.dest.images))
        .pipe(livereload());
});
