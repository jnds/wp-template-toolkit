var gulp = require('gulp'),
	del = require('del'),
	fs = require('fs'),
	project = require('../../project.config.js'),
	base = project.paths.base;

// erase build and theme folders before each compile
gulp.task('clean', function() {
	return del([base.theme], {force: true})
		.then(function() {
			fs.mkdirSync(base.theme);
		});
});