<?php

namespace App\Model;

use App\Model\Pedido;
use App\Model\Cliente;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $primaryKey = 'id';

    public $fillable = [
        'estado','total','recibido','cambio','cliente_id'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cuenta_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
