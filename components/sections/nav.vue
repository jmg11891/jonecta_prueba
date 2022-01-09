Vue.component('sectionNav', {
	computed : {
		...Vuex.mapState(['cart'])
	},
	template: `
		<div class="row container-fluid m-2">
			<div class="col col-lg-11">
				<ul class="nav nav-pills" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="tab_productos-tab" data-toggle="pill" href="#tab_productos" role="tab" aria-controls="tab_productos" aria-selected="true">Productos</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" id="tab_inventario-tab" data-toggle="pill" href="#tab_inventario" role="tab" aria-controls="tab_inventario" aria-selected="false">Inventario</a>
					</li> -->
				</ul>
			</div>
			<div class="col-lg-1">
				<button type="button" class="btn btn-secondary pull-right position-relative">
					<i class="fa fa-cart-plus"></i>
					<span class="badge badge-light" v-text="cart.productos.length"></span>
					<span class="sr-only">unread messages</span>
				</button>
			</div>
		</div>
	`
});