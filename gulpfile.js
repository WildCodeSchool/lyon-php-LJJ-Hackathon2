var gulp        = require('gulp');
var browserSync = require('browser-sync').create();

// --- Component required -->
var sass = require('gulp-sass');

// --- Browser-Sync --->
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "http://localhost:8000"
    });

    gulp.watch("src/DiscordBundle/Resources/public/scss/*.scss", ['scss:sync']);
    gulp.watch("src/DiscordBundle/Resources/views/*/*.twig").on('change', browserSync.reload);
});
// --- Compile sass into CSS & auto-inject into browsers -->
gulp.task('scss:sync', function() {
    return gulp.src("src/DiscordBundle/Resources/public/scss/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("web/assets/css"))
        .pipe(browserSync.stream());
});

// --- SCSS to CSS task -->
gulp.task('scss', function () {
    return gulp.src('src/DiscordBundle/Resources/public/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('web/assets/css'));
});