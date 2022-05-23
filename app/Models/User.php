<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Sys\Tienda\Clientes;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    public function validarPermiso($path)
    {
        $user = Clientes::join('roles as r', 'r.rol_perfil', '=', 'cli_tipo' )
                        ->join('menues as m', 'rol_menu', '=', 'm.id')
                        ->select('cli_tipo', 'men_link')
                        ->where('clientes.id', '=', auth()->id())
                        ->where('m.men_link', '=', $path)
                        ->get();

        if (!isset( $user[0]) )
            return false;
        else    
            return true;
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return []; 
    }
}
