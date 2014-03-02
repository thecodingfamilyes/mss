var gulp = require('gulp');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var sass = require('gulp-ruby-sass');
var autoprefix = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css')
var coffee = require('gulp-coffee');
var phpunit = require('gulp-phpunit');
var compass = require('gulp-compass');
var exec = require('child_process').exec;
var sys = require('sys');

// Which directory should Sass compile to?
var targetCSSDir = 'public/css';

// Where do you store your CoffeeScript files?
var coffeeDir = 'assets/coffee';

// Which directory should CoffeeScript compile to?
var targetJSDir = 'public/js';



// Handle CoffeeScript compilation
gulp.task('js', function () {
    return gulp.src(coffeeDir + '/**/*.coffee')
        .pipe(coffee().on('error', gutil.log))
        .pipe(gulp.dest(targetJSDir))
});

gulp.task('compass', function() {
    /*gulp.src('./compass/sass/*.scss')
        .pipe(compass({
            config_file: './compass/config.rb',
            css: './public/css',
            sass: './compass/sass'
        }))
        .pipe(gulp.dest('app/assets/temp'));*/
});

// Run all PHPUnit tests
gulp.task('phpunit', function() {
    //notify defaults to false. If you don't want to use a notifier or worry with errors in this task leave it off
    var options = {debug: false, notify: true}
    gulp.src('tests/**/*.php')
        .pipe(phpunit('', options)) //empty phpunit path defaults ./vendor/bin/phpunit for windows specify with double back slashes

        //both notify and notify.onError will take optional notifier: growlNotifier for windows notifications
        //if options.notify is true be sure to handle the error here or suffer the consequenses!
        .on('error', notify.onError({
            title: 'Tests Failed',
            message: 'One or more tests failed, see the cli for details.'
        }))

        //will fire only if no error is caught
        .pipe(notify({
            title: 'Tests Passed',
            message: 'All tests passed!'
        }));
});

// Keep an eye on Sass, Coffee, and PHP files for changes...
gulp.task('watch', function () {
    //gulp.watch(sassDir + '/**/*.sass', ['css']);
    gulp.watch(coffeeDir + '/**/*.coffee', ['js']);
    gulp.watch('**/*.php', ['phpunit']);
});

// What tasks does running gulp trigger?
gulp.task('default', ['compass','js', 'phpunit', 'watch']);