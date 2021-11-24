<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function getIndex() {
        $today = date('Y-m-d');
        $_30DaysAgo = date('Y-m-d', strtotime('-30 days'));;
        $announcements = Announcement::whereBetween('created_at', [$_30DaysAgo, $today])->get();
        return $announcements;
    }

    public function getPast() {

    }
}
