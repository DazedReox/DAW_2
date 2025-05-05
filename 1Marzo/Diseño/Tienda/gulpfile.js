const rename = require("gulp-rename");
//const sass = require("gulp-dart-sass");
const cssnano = require("gulp-cssnano");
//const cssmin = require("gulp-cssmin");
//const processhtml = require("gulp-processhtml");

const gulp = require("gulp");
const {src,dest,series,parallel} = require("gulp");


async function minimiza(){
    return src("./css/styles.css")
    .pipe(cssnano())
    .pipe(gulp.dest('./dist'));
}

exports.minimiza = minimiza;
