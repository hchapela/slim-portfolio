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

/*
--TOP LEVEL FUNCTIONS
gulp.task
gulp.src
gulp.dest
gulp.watch
*/

gulp.task('scripts', () => {
    gulp.src('web/assets/src/scripts/**/*.js')
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(babel())
        .pipe(concat('script.js'))
        .pipe(gulp.dest('web/assets/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest('web/assets/'));
});

gulp.task('styles', () => {
    gulp.src('web/assets/src/scss/*.scss')
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
        .pipe(gulp.dest('web/assets/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleancss())
        .pipe(gulp.dest('web/assets/'));
});

gulp.task('images', () => {
    gulp.src('web/assets/src/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('web/assets/img'));
});

gulp.task('run',['scripts','styles','images']);

gulp.task('watch',() => {
    gulp.watch('web/assets/src/img/**/*',['images']);
    gulp.watch('web/assets/src/scss/**/*.scss',['styles']);
    gulp.watch('web/assets/src/scripts/**/*.js',['scripts']);
});

gulp.task('default',['watch']);