const { src, dest, watch, series } = require('gulp');
const sass  = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const browserSync  = require('browser-sync').create();

function buildCss() {
  return src('assets/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(dest('assets/css'))
    .pipe(browserSync.stream());
}

function serve() {
  browserSync.init({
    proxy: 'localhost/desafio_revvo/src',
    notify: false
  });
  watch('assets/scss/**/*.scss', buildCss);
  watch('src/**/*.php').on('change', browserSync.reload);
}

exports.buildCss = buildCss;
exports.serve    = serve;
exports.default  = series(buildCss, serve);
