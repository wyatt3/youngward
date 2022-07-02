<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Announcement;
use App\HomePageModule;
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

        $opener = HomePageModule::where('name', 'opener')->first();
        $media = HomePageModule::where('name', 'media')->first()->media()->paginate(3);
        $today = date('Y-m-d');
        $announcements = Announcement::orderBy('created_at', 'desc')->limit(3)->get();
        $activities = Activity::where('date', '>=', $today)->orderBy('date', 'asc')->limit(3)->get();
        return view('home', [
            'page' => $page,
            'announcements'=> $announcements, 
            'activities' => $activities, 
            'opener' => $opener,
            'media' => $media,
        ]);
    }

    public function getAdminIndex() {
        $homeHeader = NavPage::where('name' , 'Home')->first()->media;
        $announcementHeader = NavPage::where('name', 'Announcements')->first()->media;
        $activityHeader = NavPage::where('name', 'Ward Activities')->first()->media;
        $opener = HomePageModule::where('name', 'opener')->first();
        $media = HomePageModule::where('name', 'media')->first();
        return view('admin.home', [
            'homeHeader' => $homeHeader, 
            'announcementHeader' => $announcementHeader, 
            'activityHeader' => $activityHeader,
            'opener' => $opener,
            'media' => $media,
        ]);
    }
}
