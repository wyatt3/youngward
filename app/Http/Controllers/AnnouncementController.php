<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Media;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    public function getIndex() {
        $today = Carbon::tomorrow();
        $_30DaysAgo = new Carbon(date('Y-m-d', strtotime('-30 days')));
        $_31DaysAgo = new Carbon(date('Y-m-d', strtotime('-31 days')));
        $announcements = Announcement::whereBetween('created_at', [$_30DaysAgo, $today])->get();
        $old_announcements = Announcement::whereBetween('created_at', ['0001-01-01 00:00:00', $_31DaysAgo])->count();
        return view('announcements.index', ['announcements' => $announcements, 'show_old_button' => $old_announcements > 0]);
    }

    public function getPast() {
        $_31DaysAgo = new Carbon(date('Y-m-d', strtotime('-31 days')));
        $announcements = Announcement::whereBetween('created_at', ['0001-01-01 00:00:00', $_31DaysAgo])->simplePaginate(25);

        return view('announcements.old', ['announcements' => $announcements]);
    }

    public function getAdminIndex() {
        $announcements = Announcement::all();

        return view('admin.announcements.index', ['announcements' => $announcements]);
    }

    public function getAdminCreate() {
        return view('admin.announcements.create');
    }

    public function postAdminCreate(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $announcement = new Announcement([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $announcement->save();
        if($request->hasFile('files')) {
            $files = $request->file('files');
            foreach($files as $image){
                $path = $image->store('public/img');
                $media = new Media([
                    'path' => ltrim($path, 'public/img'),
                ]);
                $announcement->media()->save($media);
            }
        }
        return redirect()->route('announcements.admin.index')->with('message', 'Announcement created!');
    }

    public function getAdminUpdate($id) {
        $announcement = Announcement::find($id);

        return view('admin.announcements.edit', ['announcement' => $announcement]);
    }
    
    public function postAdminUpdate(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $announcement = Announcement::find($request->id);
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->save();

        return redirect()->route('announcements.admin.index')->with('message', 'Announcement successfully edited!');
    }

    public function getAdminDelete($id) {
        $announcement = Announcement::find($id);
        $announcement->delete();

        return redirect()->route('announcements.admin.index')->with('message', 'Announcement deleted!');
    }
}
