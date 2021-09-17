<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;
use App\Models\OficinaContablePalomino\Usuario;
use App\Models\OficinaContablePalomino\Empresa;

class Asignacion extends Model
{
    protected $table = 'empresa';
    protected $fillable = ['id_empresa', 'id_usuario', 'estado_asignacion', 'condicion'];
    protected $guarded = ['id'];

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'id_empresa');
    }

    public function getIdEmpresaAttribute($value)
    {
        $empresa = Empresa::select('id')->where('id','=',$value)->first();
        return $empresa->id;
    }


    public function user()
    {
        return $this->hasOne(Usuario::class, 'id', 'id_usuario');
    }

    public function getIdUsuarioAttribute($value)
    {
        $user = Usuario::select('id')->where('id','=',$value)->first();
        return $user->id;
    }
    
}
