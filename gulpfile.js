const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');

gulp.task('sass-compile', function () {
    //могут біть другие вложенніе папки, ищем любіе файлі с расширением scss
    return gulp.src('./scss/**/*.scss')
        // подключение модулей
        .pipe(sourcemaps.init())
        // запуск sass, сообщаем об ошибке
        .pipe(sass())
        //результаты записываем в корень
        .pipe(sourcemaps.write('./'))
        //каталог, куда записываются файлы
        .pipe(gulp.dest('./css/'))
});

gulp.task('watch', function () {
    gulp.watch('./scss/**/*.scss', gulp.series('sass-compile'))
});
