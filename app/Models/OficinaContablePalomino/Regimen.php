<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    protected $table = 'regimen';
    protected $fillable = ['nombre_regimen', 'descripcion', 'condicion'];
    protected $guarded = ['id'];
}
