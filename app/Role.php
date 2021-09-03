<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['nombre', 'descripcion'];
    //  definimos nuestros roles asignables
    const ADMIN = 1;
    const GESTOR = 2;
    const INVITADO = 3;
}
