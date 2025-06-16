const rename = require("gulp-rename");
const sass = require("gulp-dart-sass");
const cssnano = require("gulp-cssnano");
const cssmin = require("gulp-cssmin");
const processhtml = require("gulp-processhtml");

const gulp = require("gulp");
const {src,dest,series,parallel} = require("gulp");


async function minimiza(){
    return src("./scss/styles.scss")
    .pipe(sass())
    .pipe(cssnano())
    .pipe(rename({
        suffix: ".min",
        extname: ".css"
    }))
    .pipe(gulp.dest('./dist/css'));
};

async function html(){
    return src("*.html")
    .pipe(processhtml())
    .pipe(dest("dist/"))
};

async function optimiza_img(){
    return src("./images/*")
    .pipe(gulp.dest("./dist/images"));
};

exports.minimiza = minimiza;
exports.html = html;
exports.optimiza_img = optimiza_img;
exports.pararelo=parallel(minimiza, html, optimiza_img);