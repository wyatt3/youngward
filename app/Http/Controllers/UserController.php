<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getIndex() {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function getUpdate($id) {

    }

    public function postUpdate(Request $request) {

    }
}
