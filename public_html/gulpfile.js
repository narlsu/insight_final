'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('sass', function(){
  return gulp.src('css/app.scss')
    .pipe(sass()) // Using gulp-sass
    .pipe(gulp.dest('css/'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

gulp.task('watch', ['browserSync', 'sass'], function(){
  gulp.watch('css/app.scss', ['sass']);
  // Other watchers
})

gulp.task('browserSync', function() {
  browserSync.init({
    // This makes the shit work because ports and crap
    proxy: "http://localhost/~845849726/Insight/",  
    // "http://localhost/~845849726/Insight/" "localhost/Insight"
    // "localhost/"
    port: 8000  
    // server: {
    //   // baseDir: './'
      
    // },
  })
})
