<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->where("deleted", "!=", 1);
        return view('admin.admin_dashboard', compact('users'));
    }

    public function activateUser($id)
    {
        $user = User::find($id);
        $user->activated = 1;
        $user->update();
        return back();
    }

    public function deactivateUser($id)
    {
        $user = User::find($id);
        $user->activated = 0;
        $user->update();
        return back();
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        return view('admin.admin_user_update')->with('user', $user);
    }

    public function editUser($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->update();
        return redirect('admin');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->deleted = 1;
        $user->update();
        return back();
    }
}
