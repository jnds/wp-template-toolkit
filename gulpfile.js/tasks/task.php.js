var gulp = require('gulp'),
 	glob = require('glob'),
    fs = require('file-system'),
    replace = require('gulp-replace'),
    changed = require('gulp-changed'),
	posthtml = require('gulp-posthtml'),
	posthtmlBem = require('posthtml-bem'),
	livereload = require('gulp-livereload'),
	project = require('../../project.config.js'),
	paths = project.paths,
 	options = project.options;

// copy project functiions
gulp.task('php:includes', function() {
	return gulp.src(paths.src.includes)
		.pipe(changed(paths.base.theme + paths.dest.includes))
		.pipe(gulp.dest(paths.base.theme + paths.dest.includes))
		.pipe(livereload());
});

// copy PHP template files
gulp.task('php:controllers', function() {
	return gulp.src(paths.src.controllers)
		.pipe(changed(paths.base.theme + paths.dest.controllers))
		.pipe(gulp.dest(paths.base.theme + paths.dest.controllers))
		.pipe(livereload());
});

// copy Twig template files
gulp.task('php:views', function() {

	//return gulp.src(paths.src.views)
	return gulp.src([paths.src.views, '!'+paths.base.src+'templates/views/base.twig'])
		.pipe(changed(paths.base.theme + paths.dest.views))
		.pipe(posthtml([posthtmlBem(project.options.bemOptions)]))
		.pipe(gulp.dest(paths.base.theme + paths.dest.views))
		.pipe(livereload());
});

// copy twig html header : isolated to avoid conflict with posthtml
gulp.task('php:header', function() {

	//return gulp.src(paths.src.views)
	return gulp.src(paths.base.src+'templates/views/base.twig')
		.pipe(changed(paths.base.theme + paths.dest.views))
		.pipe(gulp.dest(paths.base.theme + paths.dest.views))
		.pipe(livereload());
});

gulp.task('php', gulp.parallel('php:includes', 'php:controllers', 'php:views', 'php:header')); 