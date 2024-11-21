<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;


class AdminController extends Controller
{
    /*function index() {
        return view('admin.layouts.header');
    }*/

    function admin() {
        return view('admin.admin-home');
    }




/*fungsi di review*/
    function review() {
        $reviews = Review::with('product', 'user')->latest()->paginate(5);
        return view('admin.admin-reviews', compact('reviews'));
    }

    public function approveReview($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'approved';
        $review->save();

        return redirect()->route('admin-reviews')->with('success', 'Review approved successfully.');
    }

    public function rejectReview($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 'rejected';
        $review->save();

        return redirect()->route('admin-reviews')->with('info', 'Review rejected successfully.');
    }

    public function deleteReview($id)
    {
        // Temukan review berdasarkan ID
        $review = Review::findOrFail($id);
        
        // Hapus review
        $review->delete();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('admin-reviews')->with('success', 'Review has been deleted successfully.');
    }




/*fungsi di user*/
    function user()
    {
        return view('admin.admin-users', [
        'users' => User::latest()->paginate(5)
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
