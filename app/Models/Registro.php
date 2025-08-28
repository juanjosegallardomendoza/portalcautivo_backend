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

    protected static function booted()
    {
        static::creating(function ($registro) {
            $endedAt = Carbon::parse($registro->created_at)->addMinutes($registro->duration);

         
            $existe = Registro::where('created_at', '<=', $registro->created_at)
                ->where('ended_at', '>=', $registro->created_at)
                ->where("usuario_id", "=", $registro->usuario_id)
                ->where("ip", "=", $registro->ip)
                ->exists();

            if ($existe) {
                return false;
            }

            $registro->ended_at = $endedAt;
        });
    }
}
