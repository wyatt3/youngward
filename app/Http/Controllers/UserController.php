<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getIndex() {
        $users = User::orderBy('role', 'asc')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function getCreate() {
        return view('admin.users.create');
    }

    public function postCreate(Request $request) {

    }

    public function getUpdate($id) {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function postUpdate(Request $request) {

    }

    public function getDelete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('message', 'User removed!');
    }

}
