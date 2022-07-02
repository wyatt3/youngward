<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageModule extends Model
{
    protected $fillable = ['name', 'content'];

    public function media() {
        return $this->morphMany(Media::class, 'media');
    }
}
