<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Opinion;
use App\Plague;

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

    public function opinions()
    {
        $opinions = Opinion::all()->where("deleted", "!=", 1);
        return view('admin.admin_opinions', compact('opinions'));
    }

    public function createOpinionForm()
    {
        $plagues = Plague::all();
        return view('admin.admin_opinion_create_form', compact('plagues'));
    }

    public function createNewOpinion(Request $request)
    {
        $opinion = new Opinion;
        $opinion->headline = $request->input('headline');
        $opinion->description = $request->input('description');
        $opinion->plague_id = $request->input('plague_id');
        $opinion->save();
        return redirect('opinions');
    }

    public function updateOpinion($id)
    {
        $opinion = Opinion::find($id);
        return view('admin.admin_opinion_update')->with('opinion', $opinion);
    }

    public function editOpinion($id, Request $request)
    {
        $opinion = Opinion::find($id);
        $opinion->headline = $request->input('headline');
        $opinion->description = $request->input('description');
        $opinion->num_likes = $request->input('num_likes');
        $opinion->update();
        return redirect('opinions');
    }

    public function deleteOpinion($id)
    {
        $opinion = Opinion::find($id);
        $opinion->deleted = 1;
        $opinion->update();
        return back();
    }
}
