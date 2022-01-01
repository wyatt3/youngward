<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavPage extends Model
{
    protected $fillable = ['name', 'route', 'href', 'order'];

    public function isExternalPage() {
        if($this->route == null && $this->href != null) {
            return "target=_blank";
        }
    }
}
