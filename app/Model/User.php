<?php

namespace App\Model;

use App\Model\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public $fillable = [
        'nombre', 'phone', 'direccion', 'username', 'ci', 'foto', 'password', 'estado', 'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function esAdministrador()
    {
        return $this->role->nombre === 'Administrador';
    }
    public function esCocinero()
    {
        return $this->role->nombre === 'Cocinero';
    }
    public function esMesero()
    {
        return $this->role->nombre === 'Mesero';
    }
    public function esCajero()
    {
        return $this->role->nombre === 'Cajero';
    }
    public function esMesa()
    {
        return $this->role->nombre === 'Mesa';
    }
}
