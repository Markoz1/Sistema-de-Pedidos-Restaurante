<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'usuario_id';

    public $fillable = [
        'usuario_id','nombre', 'phone', 'direccion', 'username', 'ci', 'foto', 'password', 'id'
    ];

    public function usuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'id');
    }
}
