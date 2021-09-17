<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    protected $fillable = ['nombre_rol', 'descripcion', 'condicion'];
    protected $guarded = ['id'];
}
