//used for theme path and text domain for POT file
var themeName = 'umodel';
//yourlocalserver.com
var localServerName = 'umodel';

var authorEmail = 'support@modernwebtemplates.com';


//gulp plugins
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var rename      = require("gulp-rename");
var clean       = require('gulp-clean');
// header provides $switcher variable to scss to add or remove switcher styles (demo and production versions)
var header      = require('gulp-header');
var sass        = require('gulp-sass');
var sassThemes  = require('gulp-sass-themes');
var lec         = require('gulp-line-ending-corrector');
var sourcemaps  = require('gulp-sourcemaps');
var cssbeautify = require('gulp-cssbeautify');
var autoprefixer= require('gulp-autoprefixer');

//tasks in order for buildProject
var runSequence = require('run-sequence');

//js concat
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

//wordpress pot
var wpPot = require('gulp-wp-pot');
var sort = require('gulp-sort');

gulp.task('pot', function () {
    return gulp.src([
        'wp-content/themes/'+ themeName + '/**/*.php',
        'wp-content/themes/'+ themeName + '/*.php'
    ])
        .pipe(wpPot( {
            domain: themeName,
            team: authorEmail,
            package: themeName
        } ))
        .pipe(gulp.dest('wp-content/themes/'+ themeName + '/languages/'+ themeName + '.pot'));
});


// Static Server + watching scss/js/php files
gulp.task('serve', ['sass'], function() {

    browserSync.init({
        // server: {
        // 	baseDir: "./"
        // }
        proxy: localServerName
    });

    gulp.watch('wp-content/themes/'+ themeName + '/scss/**/*.scss', ['sass']);

    //js and HTML files to reload on save
    gulp.watch([
        'wp-content/themes/'+ themeName + '/**/*.php',
        'wp-content/themes/'+ themeName + '/*.php',
        'wp-content/themes/'+ themeName + '/js/*.js',
        'wp-content/themes/'+ themeName + '/**/*.js',
    ]).on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
// header provides $switcher variable to scss to add or remove switcher styles (demo and production versions)
// sourcemaps + swithcer styles
gulp.task('sass', function() {

    return gulp.src('wp-content/themes/'+ themeName + '/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(header('$switcher: true;\n'))
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        // .pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
        .pipe(sourcemaps.write('../../sourcemaps'))
        .pipe(gulp.dest('wp-content/themes/'+ themeName + '/css'))
        .pipe(browserSync.stream({match: '**/*.css'}));

    // outputStyle
    // Type: String Default: nested Values: nested, expanded, compact, compressed
});

// Compile sass for production - no swithcer styles, no sourcemaps
gulp.task('sassProduction', function() {
    return gulp.src('wp-content/themes/' + themeName + '/scss/**/*.scss')
        .pipe(header('$switcher: false;\n'))
        .pipe(sassThemes('wp-content/themes/'+ themeName + '/scss/accent_colors/_*.scss', {placeholder: /^[^_].*(\.(scss|sass))$/}))
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cssbeautify({
            indent: '	',
            // openbrace: 'separate-line',
            // autosemicolon: true
        }))
        .pipe(lec({verbose:true, eolc: 'LF', encoding:'utf8'}))
        .pipe(gulp.dest('wp-content/themes/' + themeName + '/css'))
});

gulp.task('buildProject', function() {
    runSequence(
        'sassProduction',
        'pot'
    )
});

gulp.task('cssbeautify', function() {
    //all CSS files except:
    //fonts.css
    //bootstrap.min.css
    //animations.css
    return gulp.src([
        'wp-content/themes/'+ themeName + '/css/*.css',
        '!wp-content/themes/'+ themeName + '/css/animations.css',
        '!wp-content/themes/'+ themeName + '/css/bootstrap.min.css',
        '!wp-content/themes/'+ themeName + '/css/fonts.css',
        // 'css/main.css',
        // 'css/main2.css',
        // 'css/main3.css',
    ])
        .pipe(cssbeautify({
            indent: '	',
            // openbrace: 'separate-line',
            // autosemicolon: true
        }))
        .pipe(gulp.dest('./css'));
});

gulp.task('default', ['serve']);
