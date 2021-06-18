<?php

namespace App\Models;

use App\Models\Episodie;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'links'
    ];
    
    public function episodies()
    {
        return $this->hasMany(Episodie::class);
    }

    public function getLinksAttribute($links): array
    {
        return [
            'self' => "/api/series/{$this->id}",
            'episodies' => "/api/series/{$this->id}/episodies"
        ];
    }

}