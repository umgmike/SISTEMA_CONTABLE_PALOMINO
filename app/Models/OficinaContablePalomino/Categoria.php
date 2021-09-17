<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $fillable = ['codigo', 'nombre'];
    protected $guarded = ['id'];
}
