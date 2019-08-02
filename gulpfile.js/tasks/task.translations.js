var gulp = require('gulp'),
 	glob = require('glob'),
 	fs = require('file-system'),
 	replace = require('gulp-replace'),
 	changed = require('gulp-changed'),
 	livereload = require('gulp-livereload'),
 	project = require('../../project.config.js'),
 	paths = project.paths;

// copy theme translation files
gulp.task('translations', function() {
	return gulp.src(paths.src.translations)
		.pipe(changed(paths.base.theme + paths.dest.translations))
		.pipe(gulp.dest(paths.base.theme + paths.dest.translations))
		.pipe(livereload());
});