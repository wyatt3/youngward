<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavPage extends Model
{
    protected $fillable = ['name', 'route', 'order'];
}
