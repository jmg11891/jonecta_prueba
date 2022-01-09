<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
	protected $table = "categorias";

	protected $fillable = [
		'id',
		'nombre',
		'estado',
		'fecha_creacion',
	];

	const CREATED_AT = null;
	const UPDATED_AT = null;

	protected $primaryKey = "id";

}
?>