<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
	protected $table = "productos";

	protected $fillable = [
		'id',
		'nombre',
		'referencia',
		'precio',
		'stock',
		'id_categoria',
		'estado',
		'fecha_creacion',
		'fecha_modificacion'

	];

	const CREATED_AT = 'fecha_creacion';
	const UPDATED_AT = 'fecha_modificacion';

	protected $primaryKey = "id";

	public function categoria()
	{
		return $this->belongsTo(Categorias::class, 'id_categoria', 'id');
	}
}
?>