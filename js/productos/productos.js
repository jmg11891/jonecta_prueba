class Productos{


	static controller = "/controllers/productosController.php";

	static obtenerProductos(_filtros){
		return new Promise((resolve, reject ) =>{
			let formData = new FormData();
			formData.append('act', 'obtenerProductos');
			formData.append('filtros', _filtros);

			axios.post(Productos.controller, formData).then((response) => {
				resolve(response);
			}).catch((error) => {
				reject(error);
			});
		});
	}

	static guardarProducto(producto){
		return new Promise((resolve, reject ) =>{
			let formData = new FormData();
			formData.append('act', 'guardarProducto');
			formData.append('producto', JSON.stringify(producto));

			axios.post(Productos.controller, formData).then((response) => {
				resolve(response);
			}).catch((error) => {
				reject(error);
			});
		});
	}

	static eliminarProducto(id){
		return new Promise((resolve, reject ) =>{
			let formData = new FormData();
			formData.append('act', 'eliminarProducto');
			formData.append('id', id);

			axios.post(Productos.controller, formData).then((response) => {
				resolve(response);
			}).catch((error) => {
				reject(error);
			});
		});
	}
}