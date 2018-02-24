const src = "resources/assets";
const dist = "public/assets";

const fs = require('node-fs');
const gulp = require('gulp');

//const autoprefixer = require('gulp-autoprefixer');
const clean = require('gulp-clean');
const copy = require('gulp-contrib-copy');
const concat = require('gulp-concat');
const cssmin = require('gulp-cssmin');
const merge = require('merge-stream');
//const notify = require('gulp-notify');
const rename = require('gulp-rename');
const runSequence = require('run-sequence');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const node_src = "node_modules";

var paths = {
    assets: {
        scripts: {
            js: {
                concat: [
                    "node_modules/jquery/dist/jquery.js",
                    "node_modules/bootstrap/dist/js/bootstrap.js",
                    "node_modules/bootstrap/dist/js/bootstrap.bundle.js",
                    "node_modules/jquery.easing/jquery.easing.js",
                    "node_modules/select2/dist/js/select2.full.js"

                    // src + "/js/app.js"
                ],
                copy: [
                    src + "/js/resume.js"
                ]
            }
        },
        styles: {
            css: {
                concat: [
                    "node_modules/bootstrap/dist/css/bootstrap.css",
                    "node_modules/font-awesome/css/font-awesome.css",
                    "node_modules/devicons/css/devicons.css",
                    "node_modules/simple-line-icons/css/simple-line-icons.css",
                    "node_modules/select2/dist/css/select2.css"
                ],
                copy: []
            },
            sass: {
                concat: [
                 	// src + "/sass/font.scss"
                ],
                copy: [
                    src + "/sass/resume.scss"

                ]
            }
        }
    }
};

var browserPrefixes = [
    'last 2 version',
    'safari 5',
    'ie 8',
    'ie 9',
    'opera 12.1',
    'ios 6',
    'android 4'
];

gulp.task('css', function () {
    var concatStream = gulp.src(paths.assets.styles.css.concat)
        .pipe(concat("styles.css"))
        /*.pipe(autoprefixer({
            browsers: browserPrefixes,
            cascade: false
        }))*/
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dist + '/css'));
        //.pipe(notify({message: "CSS added to project successfully !"}));

    var copyStream = gulp.src(paths.assets.styles.css.copy)
        /*.pipe(autoprefixer({
            browsers: browserPrefixes,
            cascade: false
        }))*/
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dist + '/css/'));
        //.pipe(notify({message: "CSS added to project successfully !"}));

    return merge(concatStream, copyStream);
});
gulp.task('sass', function () {
    var concatStream = gulp.src(paths.assets.styles.sass.concat)
        .pipe(sass().on('error', sass.logError))
        .pipe(concat("sass.css"))
        /*.pipe(autoprefixer({
            browsers: browserPrefixes,
            cascade: false
        }))*/
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dist + '/css/'));
        //.pipe(notify({message: "Sass compiled and added to project successfully !"}));

    var copyStream = gulp.src(paths.assets.styles.sass.copy)
        .pipe(sass().on('error', sass.logError))
        /*.pipe(autoprefixer({
            browsers: browserPrefixes,
            cascade: false
        }))*/
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dist + '/css/'));
       // .pipe(notify({message: "Sass compiled and added to project successfully !"}));

    return merge(concatStream, copyStream);
});
gulp.task('mergeStyles', function () {
    var srcStream = gulp.src([dist + "/css/styles.min.css", dist + "/css/sass.min.css"])
        .pipe(concat("app.css"))
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dist + '/css/'));
       // .pipe(notify({message: "css and sass merged"}));

    var cleanStream = gulp.src([dist + "/css/styles.min.css", dist + "/css/sass.min.css"])
        .pipe(clean());

    return merge(srcStream, cleanStream);
});
gulp.task('styles', function (callback) {
    runSequence(['css', 'sass'], 'mergeStyles', callback);
});

gulp.task('js', function () {
    var concatStream = gulp.src(paths.assets.scripts.js.concat)
        .pipe(concat("app.js"))
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dist + '/js/'));
        //.pipe(notify({message: "JS merged and minified successfully"}));

    var copyStream = gulp.src(paths.assets.scripts.js.copy)
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dist + '/js/'));
       // .pipe(notify({message: "JS merged and minified successfully"}));

    return merge(concatStream, copyStream);
});
gulp.task('scripts', ['js']);

gulp.task('clean', function () {
    return gulp.src([dist + "/css/", dist + "/js/"])
        .pipe(clean());
       // .pipe(notify({message: "builds cleaned"}));
});

gulp.task('watch', function () {
    gulp.watch(
        [
            paths.assets.styles.css.concat,
            paths.assets.styles.css.copy,
            paths.assets.styles.sass.concat,
            paths.assets.styles.sass.copy,
            src+"/sass/variables.scss",
            src+"/sass/mixins.scss",
            src+"/sass/extends.scss"
        ],
        [
            'styles'
        ]
    );
    gulp.watch(
        [
            paths.assets.scripts.js.concat,
            paths.assets.scripts.js.copy
        ],
        [
            'scripts'
        ]
    );
});

gulp.task("default", function (callback) {
    runSequence('clean', ['styles', 'scripts', 'watch'], callback);
});