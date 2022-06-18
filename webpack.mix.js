const mix = require('laravel-mix');

mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.css',
    'resources/assets/admin/css/adminlte.css',
    'resources/assets/admin/plugins/select2/css/select2.css',
    'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
], 'public/assets/admin/css/admin.css');

mix.styles([
    'resources/assets/front/css/base.css',
    'resources/assets/front/css/vendor.css',
    'resources/assets/front/css/main.css',
], 'public/assets/front/css/styles.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.js',
    'resources/assets/admin/plugins/select2/js/select2.full.js',
    'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
    'resources/assets/admin/js/adminlte.js',
], 'public/assets/admin/js/admin.js');

mix.scripts([
    'resources/assets/front/js/jquery-3.2.1.min.js',
    'resources/assets/front/js/plugins.js',
    'resources/assets/front/js/main.js',
], 'public/assets/front/js/app.js');

mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/admin/webfonts');

mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
mix.copyDirectory('resources/assets/front/images', 'public/assets/front/images');

mix.copy('resources/assets/admin/css/adminlte.css.map', 'public/assets/admin/css/adminlte.css.map');
mix.copy('resources/assets/front/js/modernizr.js', 'public/assets/front/js/modernizr.js');
mix.copy('resources/assets/front/favicon.ico', 'public/assets/front/favicon.ico');
