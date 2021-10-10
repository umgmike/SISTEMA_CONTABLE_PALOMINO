<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genero';
    protected $fillable = ['tipo_genero'];
    protected $guarded = ['id'];
}
