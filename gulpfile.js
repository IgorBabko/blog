var gulp = require('gulp');
var rename = require('gulp-rename');
var elixir = require('laravel-elixir');

require('laravel-elixir-livereload');

elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

gulp.task("copyfiles", function() {
  gulp.src("vendor/bower_dl/jquery/dist/jquery.js")
    .pipe(gulp.dest("resources/assets/js"));

  gulp.src("vendor/bower_dl/bootstrap-sass/assets/stylesheets/**")
    .pipe(gulp.dest("resources/assets/sass/bootstrap"));

  gulp.src("vendor/bower_dl/bootstrap-sass/assets/javascripts/bootstrap.js")
    .pipe(gulp.dest("resources/assets/js/"));

  gulp.src("vendor/bower_dl/bootstrap-sass/assets/fonts/**")
    .pipe(gulp.dest("public/assets/fonts"));

  gulp.src("vendor/bower_dl/font-awesome/scss/**")
    .pipe(gulp.dest("resources/assets/sass/fontawesome"));

  gulp.src("vendor/bower_dl/font-awesome/fonts/**")
    .pipe(gulp.dest("public/assets/fonts/fontawesome"));

  // Copy datatables
  var dtDir = 'vendor/bower_dl/datatables-plugins/integration/';

  gulp.src("vendor/bower_dl/datatables/media/js/jquery.dataTables.js")
    .pipe(gulp.dest('resources/assets/js/'));

  gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.css')
    .pipe(rename('dataTables.bootstrap.scss'))
    .pipe(gulp.dest('resources/assets/sass/others/'));

  gulp.src(dtDir + 'bootstrap/3/dataTables.bootstrap.js')
    .pipe(gulp.dest('resources/assets/js/'));

  // Copy selectize
  gulp.src("vendor/bower_dl/selectize/dist/css/**")
    .pipe(gulp.dest("public/assets/css/selectize"));

  gulp.src("vendor/bower_dl/selectize/dist/js/standalone/selectize.min.js")
    .pipe(gulp.dest("public/assets/js"));

  // Copy pickadate
  gulp.src("vendor/bower_dl/pickadate/lib/compressed/themes/**")
    .pipe(gulp.dest("public/assets/css/pickadate"));
  gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.js")
    .pipe(gulp.dest("public/assets/js"));
  gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.date.js")
    .pipe(gulp.dest("public/assets/js"));
  gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.time.js")
    .pipe(gulp.dest("public/assets/js"));

  // Copy autohidingnavbar
  gulp.src("vendor/bower_dl/bootstrap-autohidingnavbar/dist/jquery.bootstrap-autohidingnavbar.js")
    .pipe(gulp.dest("resources/assets/js/"));
});


/**
* Default gulp is to run this elixir stuff
*/
elixir(function(mix) {
  // Combine scripts
  mix.scripts([
    'js/jquery.js',
    'js/bootstrap.js',
    'js/jquery.dataTables.js',
    'js/dataTables.bootstrap.js',
    'js/jquery.bootstrap-autohidingnavbar.js',
    'js/app.js'
  ],
    'public/assets/js/app.js',
    'resources/assets'
  );
  // Compile Sass
  mix.sass('app.sass', 'public/assets/css/app.css').livereload();
});
