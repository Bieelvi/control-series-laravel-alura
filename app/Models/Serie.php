<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    protected $fillable = [
        'nome',
        'capa'
    ];

    public function getCapaUrlAttribute(): string
    {
        if ($this->capa) {
            return Storage::url($this->capa);
        }

        return Storage::url('serie/no-img.jpg');
    }

    public function temporadas()
    {
       return $this->hasMany(Temporada::class);
    }
}