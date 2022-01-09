const mix = require('laravel-mix');

mix.scripts([
		'js/categorias/categoria.js',
		'js/productos/productos.js'
	],
	'build/app.js'
);

mix.scripts([
		'components/productos.vue',
		'components/sections/nav.vue'
	],
	'build/appComponents.js'
);



mix.browserSync('http://konecta_prueba.com/');

if(mix.inProduction()){
	mix.version();
}

