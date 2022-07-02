<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Media;
use App\NavPage;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function getIndex() {
        $today = date('Y-m-d');
        $activities = Activity::where('date', '>=', $today)->get();
        $old_activities = Activity::where('date', '<', $today)->count();
        $page = NavPage::where('name', 'Ward Activities')->first();
        return view('activities.index', ['activities' => $activities, 'show_old_button' => $old_activities > 0, 'page' => $page]);
    }

    public function getPast() {
        $today = date('Y-m-d');
        $old_activities = Activity::where('date', '<', $today)->orderBy('date', 'desc')->get();
        $page = NavPage::where('name', 'Ward Activities')->first();
        return view('activities.old', ['activities' => $old_activities, 'page' => $page]);
    }

    public function getShow($activity_id) {
        $activity = Activity::find($activity_id);
    }

    public function getAdminIndex() {
        $activities = Activity::all();
        $page = NavPage::where('name', 'Ward Activities')->first();

        return view('admin.activities.index', ['activities' => $activities, 'page' => $page]);
    }

    public function getAdminCreate() {
        return view('admin.activities.create');
    }

    public function postAdminCreate(Request $request) {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        $activity = new Activity([
            'title' => $request->title,
            'date' => date('Y-m-d h:i:s', strtotime("{$request->date} {$request->time}")),
            'notes' => $request->notes ?? '',
        ]);
        $activity->save();
        if($request->hasFile('files')) {
            $files = $request->file('files');
            foreach($files as $image){
                $path = $image->store('public/img');
                $media = new Media([
                    'path' => ltrim($path, 'public/img'),
                ]);
                $activity->media()->save($media);
            }
        }
        return redirect()->route('activities.admin.index')->with('message', 'Activity created!');
    }

    public function getAdminUpdate($id) {
        $activity = Activity::find($id);

        return view('admin.activities.edit', ['activity' => $activity]);
    }
    
    public function postAdminUpdate(Request $request) {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        $activity = Activity::find($request->id);
        $activity->title = $request->title;
        $activity->date = date('Y-m-d h:i:s', strtotime("{$request->date} {$request->time}"));
        $activity->notes = $request->notes ?? '';
        $activity->organization_id = null;
        $activity->save();

        return redirect()->route('activities.admin.index')->with('message', 'Activity successfully edited!');
    }

    public function getAdminDelete($id) {
        $activity = Activity::find($id);
        foreach($activity->media as $media) {
            Storage::delete("public/img/{$media->path}");
            $media->delete();
        }
        $activity->delete();
        return redirect()->route('activities.admin.index')->with('message', 'Activity deleted!');
    }
}
