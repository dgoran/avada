var gulp=require('gulp');
var plumber=require('gulp-plumber');
var autoprefixer=require('gulp-autoprefixer');
/*var sass=require('gulp-ruby-sass');*/
/*var maps=require('gulp-sourcemaps');*/
var livereload=require('gulp-livereload');
/*var compass = require('gulp-compass');*/

// Css tsk
gulp.task('css', function(){
  return gulp.src('css/scss/main.scss')
          .pipe(plumber())
          /*.pipe(sass({sourcemap: true, sourcemapPath: 'scss/'}))*/
         /* .pipe(compass({
      config_file: './config.rb',
      css: 'css',
      sass: 'css/scss'
    }))*/
          .pipe(gulp.dest('css/'))
          .pipe(livereload());
          

});

// Watch for css
gulp.task('watch',function(){
    var server=livereload();
    gulp.watch('css/scss/*.scss',['css']);
});

/*Run css task and watch it*/
gulp.task('default',['css','watch']);