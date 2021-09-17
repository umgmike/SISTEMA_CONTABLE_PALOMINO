<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\OficinaContablePalomino\Rol;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';
    protected $fillable = ['id_rol','nombre',  'apellido', 'nit', 'usuario','password', 'telefono', 'condicion'];
    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->hasOne(Rol::class, 'id', 'id_rol');
    }

    public function getIdRolAttribute($value)
    {
        $roles = Rol::select('id')->where('id','=',$value)->first();
        return $roles->id;
    }
}
