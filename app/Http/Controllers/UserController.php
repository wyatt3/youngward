<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $currentUser = Auth::user();
        // Restrict non-admin access. This should be a middleware for security reasons, but that's a lot of work and this is area is already protected by Auth...
        if ((!$currentUser->isAdmin()) && $currentUser->id != $id) {
          return redirect()->route('admin.index');
        }
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
