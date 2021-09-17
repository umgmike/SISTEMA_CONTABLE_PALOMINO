<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class RelBitacora extends Model
{
    protected $table = 'rel_bitacora';
    protected $fillable = ['id', 'id_usuario', 'partida'];
    protected $guarded = ['id'];
}
