const gulp = require("gulp");
const strip = require("gulp-strip-comments");
const babel = require("gulp-babel");
// const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));

const autoprefixer = require("gulp-autoprefixer");

const notify = require("gulp-notify");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const cleanCSS = require("gulp-clean-css");
const plumber = require("gulp-plumber");

gulp.task("scripts", function () {
  return gulp
    .src(["./etnos/assets/js/**/*.js", "!./etnos/assets/js/**/*.min.js"])
    .pipe(
      babel({
        presets: ["@babel/env"],
      })
    )
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(strip())
    .pipe(gulp.dest("./etnos/assets/js"));
});

gulp.task("sass", function () {
  return gulp
    .src("./etnos/assets/css/**/*.scss")
    .pipe(plumber())
    .pipe(
      sass({
        outputStyle: "expanded",
        includePaths: ["node_modules"],
      }).on("error", function (err) {
        this.emit("end");
        return notify().write(err);
      })
    )
    .pipe(
      autoprefixer({
        browserslistrc: ["last 2 versions, not dead, > 0.2%"],
        // browserslistrc: ["> 1%', 'last 2 versions"],
        cascade: true,
      })
    )
    .pipe(cleanCSS({ compatibility: "ie8" }))
    .pipe(gulp.dest("./etnos/assets/css"));
});

gulp.task("sass_widget", function () {
  return gulp
    .src("./etnos/widgets/**/*.scss")
    .pipe(plumber())
    .pipe(
      sass({
        outputStyle: "expanded",
        includePaths: ["node_modules"],
      }).on("error", function (err) {
        this.emit("end");
        return notify().write(err);
      })
    )
    .pipe(
      autoprefixer({
        browserslistrc: ["last 2 versions, not dead, > 0.2%"],
        // browserslistrc: ["> 1%', 'last 2 versions"],
        cascade: true,
      })
    )
    .pipe(cleanCSS({ compatibility: "ie8" }))
    .pipe(gulp.dest("./etnos/widgets"));
});

//watcher
gulp.task("watch", function () {
  gulp.watch("./etnos/assets/css/**/*.scss", gulp.series("sass"));
  gulp.watch("./etnos/widgets/**/*.scss", gulp.series("sass_widget"));
  gulp.watch(
    ["./etnos/assets/js/**/*.js", "!./etnos/assets/js/**/*.min.js"],
    gulp.series("scripts")
  );
});

gulp.task("default", gulp.series("watch"));
