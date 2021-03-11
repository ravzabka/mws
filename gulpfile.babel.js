// import gulp
import gulp from "gulp";
import yargs from "yargs";
import sass from "gulp-sass";
import cleanCSS from "gulp-clean-css";
import gulpif from "gulp-if";
import sourcemaps from "gulp-sourcemaps";
import imagemin from "gulp-imagemin";
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';

const server = browserSync.create();
const PRODUCTION = yargs.argv.prod;

const paths = {

  styles: {

    src: 'src/assets/scss/bundle.scss',
    dest: './dist/assets/css'
  },

  images : {
    src: 'src/assets/images/**/*.{jpg,png,gif,jpeg,svg}',
    dest: 'dist/assets/images'

  },

  scripts: {
    src: 'src/assets/js/bundle.js',
    dest: 'dist/assets/js'

  },

  other : {

    src: ['src/assets/**/*', '!src/assets/{images,js,scss}',  '!src/assets/{images,js,scss}/**/*'],
    dest: 'dist/assets'
  },
  packaged: {

    src: ['**/*', '!node_modules{,/**}', '!packaged{,/**}' ,'!src{,/**}', '!.babelrc',
    '!.gitignore', '!gulpfile.babel.js','!package.json','!package-lock.json'],
    dest: 'packaged'
  }

}

const serve = (done)=> {
  server.init({
    proxy: "http://localhost/mws/"
  });
  done();
}

const reload = (done) => {
  server.reload();
  done();
}

 
// define functions
const styles = () => {
   
    return gulp.src(paths.styles.src)
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(server.stream());
}

const images = () => {

  return gulp.src(paths.images.src)
  .pipe(gulpif(PRODUCTION, imagemin()))
  .pipe(gulp.dest(paths.images.dest));
}

const watch = () => {

  gulp.watch('src/assets/scss/**/*.scss', gulp.series(styles));
  gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
  gulp.watch('**/*.php', reload);
  gulp.watch(paths.images.src, gulp.series(images,reload));
  gulp.watch(paths.other.src, gulp.series(copy, reload));

}
 
const copy = () => {

  return gulp.src(paths.other.src)
    .pipe(gulp.dest(paths.other.dest));
}

const clean = () => {

  return del(['dist']);
}

const scripts = () => {

  return gulp.src(paths.scripts.src)
  .pipe(named())
  .pipe(webpack({

    module: {
      rules: [
        {
          test: /\.m?js$/,
          exclude: /(node_modules|bower_components)/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        }
      ]
  },
  output: {

    filename:'[name].js'
  },
  externals: {
    jquery: 'jQuery'

  },
  devtool: !PRODUCTION ? 'inline-source-map': false
}))
  .pipe(gulpif(PRODUCTION, uglify()))
  .pipe(gulp.dest(paths.scripts.dest));
}

const compress = () => {

  return gulp.src(paths.packaged.src)
      .pipe(zip('premium.zip'))
      .pipe(gulp.dest(paths.packaged.dest));
}



 
// Expose series task
exports.build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), serve, watch);
exports.dev = gulp.series(clean, gulp.parallel(styles,scripts,images, copy));


// for testing
exports.scripts = gulp.series(scripts);
exports.zip = gulp.series(compress);
