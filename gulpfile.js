/* File: gulpfile.js */

// grab our gulp packages
var gulp  = require('gulp'),
    gutil = require('gulp-util');

// create a default task and just log a message
gulp.task('default', ['copyAlpha','watch']);

gulp.task('watch', function() {
  gulp.watch('./**/*', ['copyAlpha']);
});

gulp.task('copyAlpha', function() {
  // copy any html files in source/ to public/
  gulp.src('./**/*').pipe(gulp.dest('w:/quiz'));
});
