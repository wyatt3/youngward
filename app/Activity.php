<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title', 'date', 'organization_id', 'notes'];

    public function media() {
        return $this->morphMany(Media::class, 'media');
    }
}
