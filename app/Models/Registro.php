<?php

namespace App\Models;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    public function usuario()
    {
     return $this->belongsTo(Usuario::class);
    }
}
