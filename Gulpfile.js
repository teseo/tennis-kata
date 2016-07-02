//Init dependencies
var gulp    = require('gulp');
var plugins = require('gulp-load-plugins')();

//Roman Kata
require('./gulp-tasks/tennis')(gulp, plugins);
require('./gulp-tasks/watch-tennis')(gulp);

gulp.task('clear', function () {
    gulp.src('').pipe(plugins.run('clear'));
});

gulp.task('default', function () {
    gulp.src('').pipe(plugins.run('phpspec run -fpretty'));
});

gulp.task('tennis', ['clear','suite-tennis', 'watch-tennis']);