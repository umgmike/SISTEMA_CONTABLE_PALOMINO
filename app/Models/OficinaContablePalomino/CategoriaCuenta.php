<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class CategoriaCuenta extends Model
{
    protected $table = 'categoria_cuenta';
    protected $fillable = ['nombreCategoria'];
    protected $guarded = ['id'];
}
