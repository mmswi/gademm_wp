const buildEnv = "dev"; 
const gulp = require('gulp');
const plugins = require("gulp-load-plugins")({
    pattern: ['gulp-*', 'gulp.*', 'main-bower-files'],
    replaceString: /\bgulp[\-.]/
});

const dest = {
    css: './'
};

const sassSource = ['sass/**/*.scss'];

gulp.task('sassBuild', function () {
    var sassBuild = gulp.src(sassSource)
        .pipe(plugins.size({
            title: 'sass files in '
        }))
        .pipe(plugins.sourcemaps.init())

    if (buildEnv === "dev") {
        return sassBuild
            .pipe(plugins.sass({
                errLogToConsole: true,
                sourceComments: true
            }).on('error', plugins.sass.logError))
            .pipe(plugins.size({
                title: 'development css files out '
            }))
            .pipe(plugins.autoprefixer())
            .pipe(plugins.sourcemaps.write('./maps'))

        .pipe(gulp.dest(dest.css))
    } else if (buildEnv === "prod") {
        return sassBuild
            .pipe(plugins.sass({
                errLogToConsole: true,
                outputStyle: 'compressed'
            }).on('error', plugins.sass.logError))
            .pipe(plugins.autoprefixer())
            .pipe(plugins.size({
                title: 'production css minified files out '
            }))
            .pipe(gulp.dest(dest.css))
    }
})

gulp.task('watchProject', ['sassBuild'], function () {
    gulp.watch(sassSource, ['sassBuild'])
})

gulp.task('default', ['watchProject'])