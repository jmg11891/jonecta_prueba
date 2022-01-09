Vue.component('productos', {
	data: function(){
		return {
			producto: {
				id: null,
				nombre: '',
				referencia: '',
				precio: 0,
				id_categoria: null,
				stock: 0
			}
		}
	},
	computed : {
		...Vuex.mapState(['categorias', 'productos'])
	},
	methods: {
		...Vuex.mapActions({
			obtenerProductos: 'obtenerProductos',
			obtenerCategorias: 'obtenerCategorias'
		}),
		vaciarProducto(){
			this.producto.id = null;
			this.producto.nombre = '';
			this.producto.referencia = '';
			this.producto.precio = 0;
			this.producto.id_categoria = '';
			this.producto.stock = 0;
		},
		setDataProducto(producto){
			this.producto.id = producto.id;
			this.producto.nombre = producto.nombre;
			this.producto.referencia = producto.referencia;
			this.producto.precio = producto.precio;
			this.producto.id_categoria = producto.id_categoria;
			this.producto.stock = producto.stock;
		},
		validarFormGuardarProducto(){
			let errors = [];
			if(this.producto.nombre == ''){
				errors.push('No se ha diligenciado el nombre del producto.');
			}
			if(this.producto.referencia == ''){
				errors.push('No se ha diligenciado la referencia del producto.');
			}
			if(this.producto.precio <= 0 || this.producto.precio == ""){
				errors.push('No se ha diligenciado el precio del producto.');
			}
			if(this.producto.id_categoria == ''){
				errors.push('No se ha seleccionado la categoría del producto.');
			}
			if(this.producto.stock <= 0 || this.producto.stock == ""){
				errors.push('No se ha diligenciado el stock del producto.');
			}

			if(errors.length > 0){
				var msg = "<ul style='padding: 15px; margin-top: 10px;'>";
				errors.map( function(error){
					msg += `<li class='text-left'>${error}</li>`;
				});
				msg += "</ul>";
				Swal.fire('Atención!', msg, 'warning');
				return false;
			}else{
				return true;
			}
		},
		guardarProducto(){
			if(this.validarFormGuardarProducto()){
				this.productos.transicion = true;
				Productos.guardarProducto(this.producto).then( response => {
					if(response.data.bool){
						$("#modalAgregarProducto").modal('hide');
						Swal.fire('Correcto!', response.data.message, 'success');
						this.vaciarProducto();
						this.obtenerProductos();
					}else{
						Swal.fire('Lo sentimos!', response.data.message, 'error');
					}
					this.productos.transicion = false;
				}).catch(error => {
					console.error(error);
				});
			}
		},
		eliminarProducto(id){
			Productos.eliminarProducto(id).then( response => {
				if(response.data.bool){
					Swal.fire('Correcto!', response.data.message, 'success');
					this.obtenerProductos();
				}else{
					Swal.fire('Lo sentimos!', response.data.message, 'error');
				}
			}).catch(error => {
				console.error(error);
			});
		}
	},
	mounted: function() {
		this.obtenerCategorias();
		this.obtenerProductos();
	},
	template: `
		<div>
			<div class="row container-fluid">
				<div class="col col-12">
					<table class="table table-bordered table-hover table-striped">
						<thead class="thead-dark text-center">
							<tr>
								<th>Producto</th>
								<th>Referencia</th>
								<th>Precio</th>
								<th>Stock</th>
								<th>Categoría</th>
								<th>Fecha creación</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tr v-if="productos.transicion">
							<td colspan="7" class="container-fluid"><i class="fa fa-spinner fa-pulse fa-4x fa-fw text-darkgray"></i></td>
						</tr>
						<tbody>
							<tr v-for="producto in productos.data" v-if="productos.data.length > 0">
								<td v-text="producto.nombre" class="text-center"></td>
								<td v-text="producto.referencia" class="text-center"></td>
								<td v-text="producto.precio" class="text-center"></td>
								<td v-text="producto.stock" class="text-center"></td>
								<td v-text="producto.categoria.nombre" class="text-center"></td>
								<td v-text="producto.fecha_creacion" class="text-center"></td>
								<td class="text-center">
									<div class="dropdown">
										<button type="button" class="btn btn-light dropdown-toggle"  id="dropdownProductos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
										<div class="dropdown-menu pull-right" aria-labelledby="dropdownProductos">

											<a class="dropdown-item" @click="setDataProducto(producto)" data-toggle="modal" data-target="#modalAgregarProducto" href="#"><i class="fa fa-briefcase"></i> Editar</a>
											<a class="dropdown-item" @click="eliminarProducto(producto.id)" href="#"><i class="fa fa-trash-o"></i> Eliminar</a>
										</div>
									</div>
								</td>
							</tr>
							<tr v.else><td colspan="7" v-text="productos.message"></td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col col-lg-12">
					<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAgregarProducto"><i class="fa fa-plus"></i> Agregar producto</button>
				</div>
			</div>
			<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" >Producto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
							    <label>Nombre producto</label>
							    <input type="text" class="form-control" placeholder="Nombre producto" v-model.trim="producto.nombre">
							</div>
							<div class="form-group">
							    <label>Referencia</label>
							    <input type="text" class="form-control" placeholder="Referencia" v-model.trim="producto.referencia">
							</div>
							<div class="form-group">
							    <label>Categoria</label>
							    <select class="form-control" v-model="producto.id_categoria">
							    	<option selected="true" value="">Seleccione una opción</option>
							    	<option v-for="categoria in categorias" :value="categoria.id" v-text="categoria.nombre"></option>
							    </select>
							</div>
							<div class="form-group">
							    <label>Precio</label>
							    <input type="number" class="form-control" placeholder="Precio" v-model.trim="producto.precio" min="0" pattern="^[0-9]+">
							</div>
							<div class="form-group">
							    <label>Stock</label>
							    <input type="number" class="form-control" placeholder="Stock" v-model.trim="producto.stock" min="0" pattern="^[0-9]+">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
							<button type="button" class="btn btn-success" @click="guardarProducto()">Guardar producto</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	`
});