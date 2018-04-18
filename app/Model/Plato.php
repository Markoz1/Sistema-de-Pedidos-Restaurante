<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'palto';
    protected $primaryKey = 'id_plato';

    public $fillable = [
        'nombre', 'precio', 'descripcion', 'foto'
    ];
}
