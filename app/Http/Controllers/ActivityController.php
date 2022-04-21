<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivityController extends Controller
{
    public function getIndex() {
        $today = date('Y-m-d');
        $activities = Activity::where('date', '>=', $today)->get();
        return view('activities.index', ['activities' => $activities]);
    }

    public function getPast() {
        $today = date('Y-m-d');
        $old_activities = Activity::where('date', '<', $today)->get();
        return view('activities.old', ['activities' => $old_activities]);
    }

    public function getShow($activity_id) {
        $activity = Activity::find($activity_id);
    }

    public function getAdminIndex() {
        $activities = Activity::all();

        return view('admin.activities.index', ['activities' => $activities]);
    }

    public function getAdminCreate() {
        return view('admin.activities.create');
    }

    public function postAdminCreate(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $activity = new Activity([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $activity->save();
        return redirect()->route('activities.admin.index')->with('message', 'Activity created!');
    }

    public function getAdminUpdate($id) {
        $activity = Activity::find($id);

        return view('admin.activities.edit', ['activity' => $activity]);
    }
    
    public function postAdminUpdate(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $activity = Activity::find($request->id);
        $activity->title = $request->title;
        $activity->content = $request->content;
        $activity->save();

        return redirect()->route('activities.admin.index')->with('message', 'Activity successfully edited!');
    }

    public function getAdminDelete($id) {
        $activity = Activity::find($id);
        $activity->delete();

        return redirect()->route('activities.admin.index')->with('message', 'Activity deleted!');
    }
}
