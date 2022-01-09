<?php
require_once APP_BASENAME.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Database;

class connectionBD
{

	function __construct()
	{
		self::initConecction();
	}

	private function initConecction()
	{
		$database = new Database;
		$database->addConnection([
			"driver"		=> env('DB_DRIVER_PROVIDER'),
			"host" 			=> env('DB_HOST_PROVIDER'),
			"database" 		=> env('DB_NAME_DATABASE_PROVIDER'),
			"username" 		=> env('DB_USER_PROVIDER'),
			"password" 		=> env('DB_PASSWORD_PROVIDER'),
			'charset'   	=> env('DB_CHARSET_PROVIDER'),
			'collation' 	=> env('DB_COLLATION_PROVIDER'),
			'options'   	=> [
				\PDO::ATTR_EMULATE_PREPARES => true,
				\PDO::ATTR_PERSISTENT => true
			]
		]);
		$database->setAsGlobal();
		$database->bootEloquent();

	}
}
?>