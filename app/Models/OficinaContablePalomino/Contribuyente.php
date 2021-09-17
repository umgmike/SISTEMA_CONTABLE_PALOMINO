<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    protected $table = 'contribuyente';
    protected $fillable = ['nit', 'nombre', 'apellido', 'telefono', 'genero', 'fecha_nacimiento'];
    protected $guarded = ['id'];
}
