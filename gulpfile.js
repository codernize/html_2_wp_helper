// veni vidi codi
// gulpfile with gulp 4 keeping old system working

"use strict";

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    autoprefixer = require('autoprefixer');

const path = require('path');

const SASS_INCLUDE_PATHS = [
    path.join(__dirname, '/node_modules/foundation-sites/_vendor/normalize-scss/sass'),
    path.join(__dirname, '/node_modules/foundation-sites/scss'),
    path.join(__dirname, '/node_modules/motion-ui/src')


];

var paths = {
    styles: {
        src: './scss/*.scss',
        dest: './css/'
    },
    scripts: {
        src: './js/app.js',
        dest: './js/dest/'
    }
};

function styles() {
    return gulp
        .src(paths.styles.src, {
            sourcemaps: true
        })
        .pipe(sass({
            outputStyle: 'compressed',
            includePaths: SASS_INCLUDE_PATHS
        }))
        /*.pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9']
        }))*/
        .pipe(gulp.dest(paths.styles.dest));
}

function scripts() {
    return gulp
        .src(paths.scripts.src, {
            /*sourcemaps: true*/
        })
        .pipe(uglify())
        // .pipe(concat('app.min.js'))
        .pipe(
            rename({
                suffix: '.min'
            })
        )
        .pipe(gulp.dest(paths.scripts.dest));
}

function watch() {
    gulp.watch(paths.styles.src, styles);
    // gulp.watch(paths.scripts.src, scripts); 
}

const defualt = gulp.parallel(styles, watch);



// gulp.task(defualt);
// gulp.task('default', defualt);
// In the past, task() was used to register your functions as tasks. While that API is still available, exporting should be the primary registration mechanism, except in edge cases where exports won't work.

// export tasks
exports.watch = watch;
exports.default = defualt;
exports.styles = styles;
exports.scripts = scripts;
