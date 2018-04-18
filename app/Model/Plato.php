<?php

namespace App\Model;

use App\Model\Categoria;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'plato';
    protected $primaryKey = 'id_plato';

    public $fillable = [
        'nombre', 'precio', 'descripcion', 'foto', 'id_categoria'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
