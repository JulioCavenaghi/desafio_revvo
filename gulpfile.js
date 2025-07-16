const { src, dest, watch, series } = require('gulp');
const sass       = require('gulp-sass')(require('sass'));
const postcss    = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();

function buildCss() {
  return src('assets/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(dest('assets/css'))
    .pipe(browserSync.stream());
}

function serve() {
  browserSync.init({
    proxy: 'http://localhost/desafio_revvo',
    serveStatic: ['.' ],
    startPath: '/src',
    notify: false
  });
  watch('assets/scss/**/*.scss', buildCss);
  watch('src/**/*.php').on('change', browserSync.reload);
}

exports.buildCss = buildCss;
exports.serve    = serve;
exports.default  = series(buildCss, serve);