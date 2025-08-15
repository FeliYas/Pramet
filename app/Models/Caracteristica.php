<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $fillable = ['titulo', 'valor', 'orden', 'producto_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
