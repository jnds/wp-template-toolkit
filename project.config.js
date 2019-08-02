var base = {
    dev: './',
    src: './src/',
    theme: './dist/'
};

module.exports = {
    title: 'Starter Theme',
    //banner: banner,
    paths: {
        base: {
            dev: base.dev,
            src: base.src,
            theme: base.theme
        },
        src: {
            functions: base.src + 'includes/*.php',
            includes: base.src + 'includes/**/*.php',
            controllers: base.src + 'templates/controllers/**/*.php',
            views: base.src + 'templates/views/**/*.twig',
            images: base.src + 'assets/images/**/*',
            fonts: base.src + 'assets/fonts/**/*',
            styles: base.src + 'assets/scss/*.scss',
            stylesGlob: base.src + 'assets/scss/**/*.scss', /* also watch included files */
            scripts: base.src + 'assets/js/*.js',
            scriptsGlob: base.src + 'assets/js/**/*.js', /* also watch included files */
            defaults: base.src + 'defaults/**/*',
            translations: base.src + 'assets/translation/*' 
        },
        dest: {
            acf: 'acf-json',
            includes: 'inc',
            controllers: '', // Templates go in the theme's root folder
            views: 'views',
            styles: 'library/css',
            scripts: 'library/js',
            images: 'library/images',
            fonts: 'library/fonts',
            translations: 'library/translations'
        }
    },
    options: {
        bemOptions: {
            elemPrefix: '__',
            modPrefix: '--',
            modDlmtr: '-'
        }
    }
};