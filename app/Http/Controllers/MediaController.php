<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function delete(Request $request) {
        $media = Media::find($request->id);
        // $media->delete();
        // unlink() file
        return $media->id;
    }
}
