<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galeria';

    protected $fillable = [
        'orden',
        'path',
        'producto_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
