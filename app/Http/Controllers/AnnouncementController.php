<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    public function getIndex() {
        $today = Carbon::tomorrow();
        $_30DaysAgo = new Carbon(date('Y-m-d', strtotime('-30 days')));
        $announcements = Announcement::whereBetween('created_at', [$_30DaysAgo, $today])->get();
        return view('announcements.index', ['announcements' => $announcements]);
    }

    public function getPast() {
        $_31DaysAgo = new Carbon(date('Y-m-d', strtotime('-31 days')));
        $announcements = Announcement::whereBetween('created_at', ['0001-01-01 00:00:00', $_31DaysAgo])->simplePaginate(25);
        return view('announcements.old', ['announcements' => $announcements]);
    }

    public function getAdminIndex() {
        
    }

    public function getAdminCreate() {

    }

    public function postAdminCreate() {

    }

    public function getAdminUpdate($id) {

    }
    
    public function postAdminUpdate() {

    }

    public function postAdminDelete($request) {

    }
}
