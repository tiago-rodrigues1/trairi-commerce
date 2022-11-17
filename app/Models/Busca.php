<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busca extends Model
{
    use HasFactory;

    protected $fillable =  ['data_hora', 'termo'];

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }
}
