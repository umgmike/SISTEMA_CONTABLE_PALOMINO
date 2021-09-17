<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;
use App\Models\OficinaContablePalomino\Regimen;
use App\Models\OficinaContablePalomino\Contribuyente;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $fillable = ['id_regimen', 'nit', 'nombre_establecimiento', 'anyo_contable', 'descripcion', 'condicion'];
    protected $guarded = ['id'];

    public function regimenes()
    {
        return $this->hasOne(Regimen::class, 'id', 'id_regimen');
    }

    public function getIdRegimenesAttribute($value)
    {
        $regimenes = Regimen::select('id')->where('id','=',$value)->first();
        return $regimenes->id;
    }


    public function contribuyente()
    {
        return $this->hasOne(Contribuyente::class, 'id', 'id_contribuyente');
    }

    public function getIdContribuyenteesAttribute($value)
    {
        $contribuyentes = Contribuyente::select('id')->where('id','=',$value)->first();
        return $contribuyentes->id;
    }


}