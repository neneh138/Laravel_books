// Load Gulp...of course
var gulp         = require( 'gulp' );
 
// CSS related plugins
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var minifycss    = require( 'gulp-uglifycss' );
 
// JS related plugins
var concat       = require( 'gulp-concat' );
var uglify       = require( 'gulp-uglify' );
var babelify     = require( 'babelify' );
var browserify   = require( 'browserify' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );
var stripDebug   = require( 'gulp-strip-debug' );
 
// Utility plugins
var rename       = require( 'gulp-rename' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var notify       = require( 'gulp-notify' );
var plumber      = require( 'gulp-plumber' );
var options      = require( 'gulp-options' );
var gulpif       = require( 'gulp-if' );
 
// Browers related plugins
var browserSync  = require( 'browser-sync' ).create();
var reload       = browserSync.reload;
 
// Project related variables
var projectURL   = 'https://test.dev';
 
var styleSRC     = './resources/sass/app.scss';
var styleDist     = './public/css/';
var mapURL       = './';
 
var jsSRC        = './resources/js/';
var jsFiles      = [ 'app.js' ];
var jsDist        = './public/js/';
 
var styleWatch   = './resources/sass/**/*.scss';
var jsWatch      = './resources/js/**/*.js';
 
gulp.task( 'styles', function() {
    gulp.src( [ styleSRC ] )
        .pipe( sourcemaps.init() )
        .pipe( sass({
            errLogToConsole: true,
            outputStyle: 'compressed'
        }) )
        .on( 'error', console.error.bind( console ) )
        .pipe( autoprefixer({ browsers: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
        .pipe( rename( { suffix: '.min' } ) )
        .pipe( sourcemaps.write( mapURL ) )
        .pipe( gulp.dest( styleDist ) );
});
 
gulp.task( 'js', function() {
    jsFiles.map( function( entry ) {
        return browserify({
            entries: [jsSRC + entry]
        })
            .transform( babelify, { presets: [ 'env' ] } )
            .bundle()
            .pipe( source( entry ) )
            // .pipe( rename( {
            //     extname: '.min.js'
            // } ) )
            .pipe( buffer() )
            .pipe( gulpif( options.has( 'production' ), stripDebug() ) )
            .pipe( sourcemaps.init({ loadMaps: true }) )
            // .pipe( uglify() )
            .pipe( sourcemaps.write( '.' ) )
            .pipe( gulp.dest( jsDist ) );
    });
});
 
gulp.task( 'build', ['styles', 'js'], function() {
    gulp.src( jsDist + 'admin.min.js' )
        .pipe( notify({ message: 'Assets Compiled!' }) );
});
 
gulp.task( 'develop', ['default'], function() {
    gulp.watch( styleWatch, [ 'styles' ] );
    gulp.watch( jsWatch, [ 'js', reload ] );
    gulp.src( jsDist + 'admin.min.js' )
        .pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
});