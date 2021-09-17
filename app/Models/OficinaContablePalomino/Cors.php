<?php

namespace App\Models\OficinaContablePalomino;

use Illuminate\Database\Eloquent\Model;

class Cors extends Model
{
    protected $table = 'cors';
    protected $fillable = ['id', 'cors_nombre'];
    protected $guarded = ['id'];
}
