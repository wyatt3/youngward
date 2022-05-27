<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function add(Request $request) {
        
    }

    public function delete(Request $request) {
        $media = Media::find($request->id);
        $media->delete();
        Storage::delete("public/img/{$media->path}");
        return $media->id;
    }
}
