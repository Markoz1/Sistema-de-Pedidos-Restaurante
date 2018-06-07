<?php

namespace App\Model;

use App\Model\Producto;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'categoria_id';

    public $fillable = [
        'nombre',
        'estado'
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
