<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'role_id', 'name', 'email', 'password', 'sexo', 'picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //  reconstruimos la ruta de las imagenes
    public function pathAttachment () {
        return "/images/users/" . $this->picture;
    }

    public function role () {
        return $this->belongsTo(Role::class);
    }

    public static function navigation () {

        return (auth()->check()) ? auth()->user()->role->nombre : 'invitado';
    }
}
