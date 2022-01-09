class Categorias{

	static controller = "/controllers/categoriasController.php";

	static obtenerCategorias(){
		return new Promise((resolve, reject ) =>{
			let formData = new FormData();
			formData.append('act', 'obtenerCategorias');

			axios.post(Categorias.controller, formData).then((response) => {
				resolve(response);
			}).catch((error) => {
				reject(error);
			});
		});
	}
}