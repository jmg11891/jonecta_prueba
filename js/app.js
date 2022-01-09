class App{

	static initApp(){
		new Vue({
			el    		: '#appInventario',
			store   	: StoreCafeteria.init(),
		});
	}
}

class StoreCafeteria{

	static init(){
		return StoreCafeteria.storeInit();
	}

	static storeInit(){
		return new Vuex.Store({
			state: {
				categorias: [],
				productos: {
					data: [],
					message: "",
					transition: false
				},
				cart:{
					productos: []
				}

			},
			mutations: {
				setCategorias(state, data){
					state.categorias = data;
				},
				setProductos(state, data){
					state.productos.data = data;
				},
				setMessageProductos(state, message){
					state.productos.message = message;
				}
			},
			actions: {
				obtenerCategorias({commit}){
					Categorias.obtenerCategorias().then( response => {
						if(response.data.bool){
							commit('setCategorias', response.data.message);
						}
					}).catch(error => {
						console.error(error);
					});
				},
				obtenerProductos({commit, state}){
					state.productos.transicion = true;
					Productos.obtenerProductos().then( response => {
						if(response.data.bool){
							commit('setProductos', response.data.message);
						}else{
							commit('setMessageProductos', response.data.message);
						}
						state.productos.transicion = false;
					}).catch(error => {
						console.error(error);
					});
				},
			}
		})
	}
}