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
      $request->validate([
        ''
        ]);
    }

    public function getUpdate($id) {
        $currentUser = Auth::user();
        // Restrict non-admin access. This should be a middleware for security reasons, but that's a lot of work and this is area is already protected by Authentication...
        if ((!$currentUser->isAdmin()) && $currentUser->id != $id) {
          return redirect()->route('admin.index');
        }
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function postUpdate(Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);
        return redirect()->route(Auth::user()->isAdmin() ? 'users.index' : 'admin.index')->with('message', 'Account updated!');
    }

    public function getDelete($id) {
        if(Auth::user()->id == $id) {
            return redirect()->route('users.index')->with('message', 'That is the current user. Can\'t remove.');
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('message', 'User removed!');
    }

}
