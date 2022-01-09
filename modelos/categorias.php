<?php
/**
 *
 */
use Models\Categorias;

class categoriasClass
{
	public $response;

	function __construct()
	{
		$this->response = new stdClass;
	}

	public function obtenerCategorias()
	{
		try {
			$categorias = Categorias::where('estado', 'activo')->get(['id', 'nombre']);
			if($categorias->count() > 0){
				$this->response->bool = true;
				$this->response->message = $categorias;
			}else{
				$this->response->bool = false;
				$this->response->message = 'No se encontraron categorías registradas.';
			}
		} catch (Exception $e) {
			$this->response->bool = false;
			$this->response->message = 'Se presentó un inconveniente al consultar los productos.';
			$this->response->devMessage = $e->getMessage();
		}
		return $this->response;
	}
}

 ?>