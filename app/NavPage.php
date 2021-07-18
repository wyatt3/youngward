<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavPage extends Model
{
    protected $fillable = ['name', 'route', 'url', 'order'];

    public function isExternalPage() {
        if($this->route == null && $this->url != null) {
            return "target=_blank";
        }
    }
}
