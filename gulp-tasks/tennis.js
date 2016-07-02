module.exports = function(gulp, plugins) {
    gulp.task('suite-tennis', function () {
        return gulp.src('spec/Tennis/MatchSpec.php', {base: './'})
            .pipe(plugins.phpspec('', {notify: true, testSuite: 'spec/Tennis/MatchSpec.php'}))
            .on('error', plugins.notify.onError({
                title: 'Crap',
                message: 'Your tennis match tests failed, Javi'
            }))
            .on("error", function () {
                this.emit('end')
            })
            .pipe(plugins.notify({
                title: 'Success',
                message: 'All tennis match tests have returned green!'
            }));
    });
}