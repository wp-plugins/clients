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
}); 

gulp.task('css', function () 
{
  	gulp.src('scss/ct.scss')
  	.pipe(sass({sourcemapPath: 'scss', style: 'compressed'}))
  	.on('error', function (err) { console.log(err.message); })
    .pipe(gulp.dest('./assets/css'));    
});

gulp.task('js', function () 
{
    gulp.src('js/ct-admin.js')
    .pipe(uglify('ct-admin.js'))
    .pipe(gulp.dest('./assets/js'));
});

gulp.task('default', ['css', 'js']); 