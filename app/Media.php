<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['path', 'media_id', 'media_type'];

    public function media() {
        return $this->morphTo();
    }

}
