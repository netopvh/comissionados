import gulp from 'gulp';
import less from 'gulp-less';
import concat from 'gulp-concat';
import rename  from 'gulp-rename';
import cleanCss from 'gulp-clean-css';
import uglify from 'gulp-uglify-es';

const PATH = 'resources/assets/';
const PATH_TEMPLATE = PATH + 'template/';
const PATH_JS = PATH + 'js/';

gulp.task('less', function () {
    return gulp.src([
        PATH_TEMPLATE + 'less/_main_full/bootstrap.less',
        PATH_TEMPLATE + 'less/_main_full/core.less',
        PATH_TEMPLATE + 'less/_main_full/components.less',
        PATH_TEMPLATE + 'less/_main_full/colors.less',
        PATH_TEMPLATE + 'less/_main_full/custom.less'
    ])
        .pipe(less())
        .pipe(concat('all.min.css'))
        .pipe(cleanCss())
        .pipe(gulp.dest('public/css'))
});

gulp.task('icons', function () {
    return gulp.src([
        PATH_TEMPLATE + 'icons/icomoon/styles.css'
    ])
        .pipe(rename("icomoon.min.css"))
        .pipe(cleanCss())
        .pipe(gulp.dest('public/css'));
});

gulp.task('js', function () {
    return gulp.src([
        PATH_TEMPLATE + 'js/plugins/loaders/pace.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery.min.js',
        PATH_TEMPLATE + 'js/core/libraries/bootstrap.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery_ui/core.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery_ui/effects.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery_ui/interactions.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery_ui/touch.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery_ui/widgets.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery_ui/globalize/globalize.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery_ui/globalize/cultures/globalize.culture.pt-BR.js',
        PATH_TEMPLATE + 'js/plugins/loaders/blockui.min.js',
        PATH_TEMPLATE + 'js/plugins/ui/nicescroll.min.js',
        PATH_TEMPLATE + 'js/plugins/notifications/sweet_alert.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/styling/uniform.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/selects/select2.min.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/datatables.min.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/extensions/responsive.min.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/extensions/buttons.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/validation/validate.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/validation/localization/messages_pt_BR.js',
        PATH_TEMPLATE + 'js/plugins/trees/jstree.js',
        PATH_TEMPLATE + 'js/plugins/forms/mask/inputmask/dist/jquery.inputmask.bundle.js',
        PATH_TEMPLATE + 'js/core/app.js',
        PATH_JS + 'actions/access/users.js',
        PATH_JS + 'actions/access/roles.js',
        PATH_JS + 'actions/access/permissions.js',
        PATH_JS + 'actions/access/audit.js',
        PATH_JS + 'actions/comissionado/cargos.js',
        PATH_JS + 'actions/comissionado/instrucao.js',
        PATH_JS + 'actions/comissionado/regime.js',
        PATH_JS + 'actions/comissionado/secretarias.js',
        PATH_JS + 'actions/comissionado/tipos.js',
        PATH_JS + 'actions/comissionado/servidores.js',
        PATH_JS + 'actions/comissionado/validacao.js'
    ])
        .pipe(concat('bundle.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'))
});

gulp.task('images', function () {
    return gulp.src([
        PATH_TEMPLATE + 'images/**/**'
    ])
        .pipe(gulp.dest('public/images'));
});

gulp.task('fonts', function () {
    return gulp.src([
        PATH_TEMPLATE + 'icons/fontawesome/fonts/*',
        PATH_TEMPLATE + 'icons/glyphicons/*',
        PATH_TEMPLATE + 'icons/icomoon/fonts/*',
        PATH_TEMPLATE + 'icons/summernote/*'
    ])
        .pipe(gulp.dest('public/fonts'));
});

//mix.copy('resources/assets/template/js/','public/js/layout.js');
//mix.copy('resources/assets/template/icons/icomoon/styles.css','public/css/icomoon.min.css');


//gulp.task('default', ['bootstrap-less','icon-css','js', 'images','fonts']);
gulp.task('watch',function () {
    gulp.watch(PATH_JS + 'actions/*.js',['js'])
});