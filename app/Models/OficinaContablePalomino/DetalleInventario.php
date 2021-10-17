<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class DetalleInventario extends Model
{
    protected $table = 'detalle_inventario';
    protected $fillable = ['id_inventario', 'id_cuenta', 'debe', 'haber'];
    protected $guarded = ['id'];
}
