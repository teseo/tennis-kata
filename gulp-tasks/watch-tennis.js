module.exports = function(gulp) {
    gulp.task('watch-tennis', function () {
        return gulp.watch(['spec/Tennis/MatchSpec.php', 'src/Tennis/Match.php'], {base: './'}, ['suite-tennis']);
    });
}