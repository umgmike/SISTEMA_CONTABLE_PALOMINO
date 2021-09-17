<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;
use App\Models\OficinaContablePalomino\Categoria;

class Cuenta extends Model
{
    protected $table = 'cuenta';
    protected $fillable = ['id_categoria', 'id_categoria_cuenta', 'id_cors', 'codigoCuenta', 'nombreCuenta', 'condicion'];
    protected $guarded = ['id'];

    public function cat()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }

    public function getIdCategoriaAttribute($value)
    {
        $cat = Categoria::select('id')->where('id','=',$value)->first();
        return $cat->id;
    }
}
