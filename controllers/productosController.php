<?php
require_once "../modelos/app.php";

$response = new stdClass;

if($_POST['act']){
	switch ($_POST['act']) {
		case 'obtenerProductos':
		$response = (new productosClass)->obtenerProductos();
		break;
		case 'guardarProducto':
		$response = (new productosClass)->guardarProducto(json_decode($_POST['producto']));
		break;
		case 'eliminarProducto':
		$response = (new productosClass)->eliminarProducto($_POST['id']);
		break;
		default:
		$response->bool = false;
		$response->message = "Peitición no reconocida.";
		break;
	}
}else{
	$response->bool = false;
	$response->message = "Peitición no reconocida.";
}
echo json_encode($response);
?>