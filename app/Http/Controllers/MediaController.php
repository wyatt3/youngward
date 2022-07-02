<?php

namespace App\Http\Controllers;

use App\HomePageModule;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function add(Request $request) {
        if($request->TotalFiles > 0) {
            $allMedia = [];
            for ($x = 0; $x < $request->TotalFiles; $x++) {

                if ($request->hasFile('files'.$x)) 
                {
                    $file      = $request->file('files'.$x);
                    $path = $file->store('public/img');
                    $media = new Media([
                        'path' => ltrim($path, 'public/img'),
                        'media_id' => $request->id,
                        'media_type' => $request->type,
                    ]);
                    $media->save();
                    $allMedia[] = $media;
                }
            }

            return $allMedia;
        }
        return true;
    }

    public function updateHeader(Request $request) {
        $media = Media::find($request->mediaID) ?? new Media();
        Storage::delete("public/img/{$media->path}");

        $file = $request->file('file');
        $path = $file->store('public/img');

        $media->media_type = "App\NavPage";
        $media->media_id = $request->mediableID;
        $media->path = ltrim($path, 'public/img');
        $media->save();
        
        return redirect()->route('admin.index')->with('message', 'Header updated.');
    }

    public function delete(Request $request) {
        $media = Media::find($request->id);
        $media->delete();
        Storage::delete("public/img/{$media->path}");
        return $media->id;
    }

    public function updateOpener(Request $request) {
        $opener = HomePageModule::where('name', 'opener')->first();

        $opener->content = $request->content;
        $opener->save();

        return redirect()->route('admin.index')->with('message', 'Successfully updated.');
    }
}
