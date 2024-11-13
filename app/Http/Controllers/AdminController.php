<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    /*function index() {
        return view('admin.layouts.header');
    }*/

    function admin() {
        return view('admin.admin-home');
    }

    function review() {
        return view('admin.admin-reviews');
    }

    function user()
    {
        return view('admin.admin-users', [
        'users' => User::latest()->get()
        ]);
    }

    function updateRole(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin-users')->with('success', 'User role updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin-users')->with('success', 'User deleted successfully');
    }


    
}
