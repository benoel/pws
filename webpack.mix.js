const { mix } = require('laravel-mix');

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/

// mix.js('resources/assets/js/app.js', 'public/js');
mix.sass('resources/assets/sass/app.scss', 'public/css');



// VENDOR
mix.js([
	'public/vendor/js/bootstrap.min.js',
	'public/vendor/js/jquery.cookie.js',
	'public/vendor/js/jquery.validate.min.js',
	'public/vendor/js/charts-custom.js',
	'public/vendor/js/charts-home.js',
	'public/vendor/js/front.js',
	'public/vendor/js/dataTables.bootstrap4.min.js',
	'public/vendor/js/datepicker_by_gijgo.js',
	'node_modules/select2/dist/js/select2.min.js'
	], 'public/js/vendor.js')
.autoload({
	tether: ['Tether', 'window.Tether']
})
.styles([
	'public/vendor/css/bootstrap.min.css',
	'public/vendor/css/font-awesome.min.css',
	'public/vendor/css/icons.css',
	'public/vendor/css/style.sea.css',
	// 'public/vendor/css/style.default.css',
	// 'public/vendor/css/style.green.css',
	// 'public/vendor/css/style.pink.css',
	// 'public/vendor/css/style.red.css',
	// 'public/vendor/css/style.violet.css',
	'public/vendor/css/dataTables.bootstrap4.min.css',
	'public/vendor/css/datepicker_by_gijgo.css'
	], 'public/css/vendor.css');



