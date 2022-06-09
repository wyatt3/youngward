<?php

namespace App\Http\Controllers;

use App\NavPage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getIndex() {
        return view('home');
    }

    public function getAdminIndex() {
        $announcementHeader = NavPage::where('name', 'Announcements')->first()->media;
        $activityHeader = NavPage::where('name', 'Ward Activities')->first()->media;
        return view('admin.home', ['announcementHeader' => $announcementHeader, 'activityHeader' => $activityHeader]);
    }
}
