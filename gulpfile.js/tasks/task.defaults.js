var gulp = require('gulp'),
 	glob = require('glob'),
 	fs = require('file-system'),
 	replace = require('gulp-replace'),
 	changed = require('gulp-changed'),
 	livereload = require('gulp-livereload'),
	project = require('../../project.config.js');
 	paths = project.paths;

// copy theme defaults
gulp.task('defaults', function() {
	return gulp.src(paths.src.defaults)
		.pipe(changed(paths.base.theme))
		.pipe(gulp.dest(paths.base.theme))
		.pipe(livereload());
});