<?php
require_once "../modelos/app.php";

$response = new stdClass;

if($_POST['act']){
	switch ($_POST['act']) {
		case 'obtenerCategorias':
		$response = (new categoriasClass)->obtenerCategorias();
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