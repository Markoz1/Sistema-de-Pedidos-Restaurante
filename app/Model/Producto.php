<?php

namespace App\Model;

use App\Model\Categoria;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'producto_id';

    public $fillable = [
        'nombre', 'precio', 'descripcion', 'foto', 'categoria_id'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
