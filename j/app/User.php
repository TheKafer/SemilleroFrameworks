<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function transacciones(){
        return $this->hasMany('App\transaccione','usuario_id');
    }

     public function prestamosHechos(){
        return $this->hasMany('App\prestamo','usuario_id_prestamista');
    }

    public function prestamosAceptados(){
        return $this->hasMany('App\prestamo','usuario_id_endeudado');
    }

    public function propuestas(){
        return $this->hasMany('App\propuesta','usuario_id');
    }
}
