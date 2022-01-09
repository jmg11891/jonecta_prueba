<?php
define("APP_BASENAME", dirname(__DIR__));
require_once APP_BASENAME.'/vendor/autoload.php';
// instancia para lectua de variables de entorno (.env)
$dotenv = Dotenv\Dotenv::create(APP_BASENAME);
$dotenv->load();
require_once APP_BASENAME.'/config/database.php';
new connectionBD;

// se instancian los archivos de las clases
require_once APP_BASENAME.'/modelos/productos.php';
require_once APP_BASENAME.'/modelos/categorias.php';



?>