<?php

namespace App\Model;

use App\Model\Role;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public $fillable = [
        'id', 'nombre', 'phone', 'direccion', 'username', 'ci', 'foto', 'password', 'estado', 'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
