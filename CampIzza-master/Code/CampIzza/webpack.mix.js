
const mix = require('laravel-mix');

mix
  .copyDirectory('resources/images', 'public/img')
  .copyDirectory('resources/fonts/nucleo', 'public/fonts/vendor/nucleo')
  .copyDirectory('resources/css', 'public/css')

  .js('resources/js/bootstrap.js', 'public/js')
  .js('resources/js/argon.js', 'public/js')

  .js('resources/js/pages/parent/contact.js', 'public/js/pages/parent')
  .js('resources/js/pages/parent/campers.js', 'public/js/pages/parent')

  .js('resources/js/pages/owner/parent.js', 'public/js/pages/owner')
  .js('resources/js/pages/owner/campers.js', 'public/js/pages/owner')

  .sass('resources/sass/bootstrap.scss', 'public/css')
  .sass('resources/sass/vendor/argon.scss', 'public/css')

  .sass('resources/sass/errors/404.scss', 'public/css/errors')

  .sass('resources/sass/pages/auth.scss', 'public/css/pages')
  .sass('resources/sass/pages/dashboard.scss', 'public/css/pages')
;
