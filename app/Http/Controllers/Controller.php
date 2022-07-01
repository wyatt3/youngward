<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Announcement;
use App\NavPage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getIndex() {
        $page = NavPage::where('name', 'Home')->first();
        $media = NavPage::where('name', 'HomeMedia')->first();

        $today = date('Y-m-d');
        $announcements = Announcement::orderBy('created_at', 'desc')->limit(3)->get();
        $activities = Activity::where('date', '>=', $today)->orderBy('date', 'asc')->limit(3)->get();
        return view('home', ['page' => $page, 'media' => $media, 'announcements'=> $announcements, 'activities' => $activities,]);
    }

    public function getAdminIndex() {
        $homeHeader = NavPage::where('name' , 'Home')->first()->media;
        $announcementHeader = NavPage::where('name', 'Announcements')->first()->media;
        $activityHeader = NavPage::where('name', 'Ward Activities')->first()->media;
        return view('admin.home', ['homeHeader' => $homeHeader, 'announcementHeader' => $announcementHeader, 'activityHeader' => $activityHeader]);
    }
}
