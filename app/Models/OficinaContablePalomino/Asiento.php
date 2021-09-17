<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $table = 'asiento';
    protected $fillable = ['fecha_asiento', 'numero_partida', 'total_debe', 'total_haber', 'descripcion'];
    protected $guarded = ['id'];
}
