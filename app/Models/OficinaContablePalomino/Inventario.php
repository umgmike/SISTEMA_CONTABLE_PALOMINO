<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario_final';
    protected $fillable = ['id_usuario', 'fecha_inventario', 'monto_total', 'descripcion', 'condicion'];
    protected $guarded = ['id'];
}
