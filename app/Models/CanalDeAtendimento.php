<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanalDeAtendimento extends Model
{
    use HasFactory;

    protected $fillable = ['plataforma', 'link', 'icone'];

    public function anunciantes() {
        return $this->belongsToMany(Anunciante::class, 'possuis')->withPivot('user')->withTimestamps();
    }
}
