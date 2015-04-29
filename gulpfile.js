
var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    myth = require('gulp-myth'),
    minifyCss = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    notify = require('gulp-notify'),

    fr_js_dir = 'frontend/web/js/',
    fr_js = [
        fr_js_dir + 'jquery.min.js', 
        fr_js_dir + 'yii.js',
        fr_js_dir + 'yii.validation.js', 
        fr_js_dir + 'yii.activeForm.js', 
        fr_js_dir + 'jquery-ui.min.js', 
        fr_js_dir + 'bootstrap.min.js', 
        fr_js_dir + 'jquery.formstyler.min.js', 
        fr_js_dir + 'jquery.maskedinput.min.js', 
        fr_js_dir + 'jquery.unoslider.min.js', 
        fr_js_dir + 'jquery.fancybox.pack.js', 
        fr_js_dir + 'jquery.columnizer.min.js', 
        // fr_js_dir + 'yii.formHandler.js', 
        fr_js_dir + '_site.js' 
        ],
    fr_js_ready_name = 'scripts.min.js',
    fr_js_dest = 'frontend/web/js/',

    fr_css_dir = 'frontend/web/css/',
    fr_css = [
        fr_css_dir + 'bootstrap.min.css',
        fr_css_dir + 'font-awesome.min.css',
        fr_css_dir + 'jquery-ui.min.css',
        fr_css_dir + 'jquery.fancybox.css',
        fr_css_dir + '_style.css',
        ],
    fr_css_ready_name = 'style.min.css',
    fr_css_dest = 'frontend/web/css/';


gulp.task('js', function () {
    return gulp
        .src(fr_js)
        .pipe(concat(fr_js_ready_name))
        .pipe(uglify())
        .pipe(gulp.dest(fr_js_dest))
        .pipe(notify({ message: 'Concat and Minifying JavaScript files'}));
});

gulp.task('css', function () {
    return gulp
        .src(fr_css)
        .pipe(concat(fr_css_ready_name))
        .pipe(myth())
        .pipe(minifyCss())
        .pipe(gulp.dest(fr_css_dest))
        .pipe(notify({ message: 'Concat and Minifying CSS files'}));
});

gulp.task('images', function() {
    gulp.src('frontend/web/images/*')
        .pipe(imagemin())
        .pipe(gulp.dest('frontend/web/images/imagemin'));
});


gulp.task('watch', function() {
    gulp.watch(fr_js, ['js']);
    gulp.watch(fr_css, ['css']);
});


gulp.task('default', ['watch']);