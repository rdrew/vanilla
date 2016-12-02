'use strict';
var gulp, sass, jade, sourcemaps, autoprefixer, importer, plumber, browserSync, sass_config;

gulp = require('gulp');
sass = require('gulp-sass');
sourcemaps = require('gulp-sourcemaps');
autoprefixer = require('gulp-autoprefixer');
importer = require('node-sass-globbing');
plumber = require('gulp-plumber');
browserSync = require('browser-sync').create();
jade = require('gulp-jade-drupal');

sass_config = {
    importer: importer,
    includePaths: [
        //'node_modules/breakpoint-sass/stylesheets/',
        //'node_modules/singularitygs/stylesheets/',
        //'node_modules/compass-mixins/lib/'
    ]
};

gulp.task('browser-sync', function() {
    browserSync.init({
        //injectChanges: true,
        proxy: "localhost/drupal"
    });
    gulp.watch("./sass/**/*.scss", ['sass:dev']).on('change', browserSync.reload);
});

gulp.task('templates', function() {
  gulp.src('./templates/jade/**/*.jade')
    .pipe(jade({
        locals: {
          title: 'OMG THIS IS THE TITLE'
        }
     }))
     .pipe(gulp.dest('./templates'));
});

gulp.task('sass:prod', function() {
    gulp.src('./sass/**/*.scss')
        .pipe(sass(sass_config).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 version']
        }))
        .pipe(gulp.dest('./css'));
});

gulp.task('sass:dev', function() {
    gulp.src('./sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass(sass_config).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 version']
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./css'));
});

//gulp.task('sass:watch', function () {
//gulp.watch('./sass/**/*.scss', ['sass:dev']);
//});

//gulp.task('default', ['sass:dev', 'sass:watch']);
gulp.task('default', ['browser-sync']);
gulp.task('live', ['sass:prod']);
