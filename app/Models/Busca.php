<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busca extends Model
{
    use HasFactory;

    protected $fillable = ['termo'];

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }
}
