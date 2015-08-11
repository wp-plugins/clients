var gulp    = require('gulp');
var watch   = require('gulp-watch');
var sass    = require('gulp-ruby-sass');
var uglify  = require('gulp-uglifyjs');

var cssDir  = 'scss';
var jsDir   = 'js';

gulp.task('watch', function () 
{
	gulp.watch(cssDir + '/**/*.scss', ['css']);
	gulp.watch(jsDir + '/**/*.js', ['js']);
   gulp.watch(jsDir + '/**/*.js', ['jsuser']);
}); 

gulp.task('css', function () 
{
   return sass(cssDir)
  .pipe(gulp.dest('./assets/css'));    	  
});

gulp.task('js', function () 
{
    gulp.src('js/ct-admin.js')
    .pipe(uglify('ct-admin.js'))
    .pipe(gulp.dest('./assets/js'));
});

gulp.task('jsuser', function () 
{
    gulp.src('js/ct-user.js')
    .pipe(uglify('ct-user.js'))
    .pipe(gulp.dest('./assets/js'));
});

gulp.task('default', ['css', 'js']); 