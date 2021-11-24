<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function getIndex() {

    }

    public function getPast() {

    }

    public function getShow($activity_id) {
        $activity = Activity::find($activity_id);
    }
}
