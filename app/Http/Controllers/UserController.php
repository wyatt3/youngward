<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        'name' => 'required',
        'email' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ? 'admin' : 'user',
            'password' => Hash::make("YoungWard"),
        ]);
        return redirect()->route('users.index')->with('message', 'User Created.');
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'oldPassword' => 'nullable|current_password|required_with:newPassword,newPasswordConfirm',
            'newPassword' => 'required_with:oldPassword,newPasswordConfirm',
            'newPasswordConfirm' => 'required_with:oldPassword,newPassword|same:newPassword',
        ];
        $messages = [
            // 'required_with' => 'The :attribute field is required unless :other is blank.',
            'current_password' => 'Incorrect user password.',
            'same' => 'The :attribute field and :other field must be the same',
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->newPassword) {
            $user->password = Hash::make($request->newPassword);
        }
        $user->save();
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
