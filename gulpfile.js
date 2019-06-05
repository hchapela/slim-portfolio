const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const imagemin = require('gulp-imagemin');
const plumber = require('gulp-plumber');
const browserify = require('gulp-browserify');

/*
--TOP LEVEL FUNCTIONS
gulp.task
gulp.src
gulp.dest
gulp.watch
*/

gulp.task('scripts', () => {
    gulp.src('assets/src/scripts/**/*.js')
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(browserify())
        .pipe(babel())
        .pipe(concat('script.js'))
        .pipe(gulp.dest('assets/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest('assets/'));
});

gulp.task('styles', () => {
    gulp.src('assets/src/scss/*.scss')
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
        .pipe(gulp.dest('assets/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleancss())
        .pipe(gulp.dest('assets/'));
});

gulp.task('images', () => {
    gulp.src('assets/src/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('assets/img'));
});

gulp.task('run',['scripts','styles','images']);

gulp.task('watch',() => {
    gulp.watch('assets/src/img/**/*',['images']);
    gulp.watch('assets/src/scss/**/*.scss',['styles']);
    gulp.watch('assets/src/scripts/**/*.js',['scripts']);
});

gulp.task('default',['watch']);