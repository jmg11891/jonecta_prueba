<?php

/**
 *
 */

use Models\Productos;

class productosClass
{

	public $response;

	function __construct()
	{
		$this->response = new stdClass;
	}

	public function obtenerProductos($filtros = null){
		try {
			$productos = Productos::where('estado', 'activo')
			->with('categoria:id,nombre')
			->get();
			if($productos->count() > 0){
				$this->response->bool = true;
				$this->response->message = $productos;
			}else{
				$this->response->bool = false;
				$this->response->message = 'No se encontraron productos registrados.';
			}
		} catch (Exception $e) {
			$this->response->bool = false;
			$this->response->message = 'Se presentó un inconveniente al consultar los productos.';
			$this->response->devMessage = $e->getMessage();
		}

		return $this->response;
	}

	public function guardarProducto($objProducto)
	{
		try {
			if(isset($objProducto->id)){
				$producto = Productos::find($objProducto->id);
			}else{
				$producto = new Productos();
			}
			$producto->nombre = $objProducto->nombre;
			$producto->referencia = $objProducto->referencia;
			$producto->id_categoria = $objProducto->id_categoria;
			$producto->precio = $objProducto->precio;
			$producto->stock = $objProducto->stock;

			$producto->save();

			$this->response->bool = true;
			$this->response->msg = "Se guardó el producto correctamente.";

		} catch (Exception $e) {
			$this->response->bool = false;
			$this->response->message = 'Se presentó un inconveniente al guardar el producto.';
			$this->response->devMessage = $e->getMessage();
		}

		return $this->response;
	}


	public function eliminarProducto($id)
	{
		try {
			Productos::where("id", $id)->update(["estado" => "eliminado"]);
			$this->response->bool = true;
			$this->response->msg = "Se eliminó el producto correctamente.";
		} catch (Exception $e) {
			$this->response->bool = false;
			$this->response->message = 'Se presentó un inconveniente al eliminar el producto.';
			$this->response->devMessage = $e->getMessage();
		}
		return $this->response;
	}
}

?>