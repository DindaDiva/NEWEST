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
        // Ambil review yang disetujui untuk produk dan jasa
        $approvedReviews = Review::where('status', 'approved')->get();
        
        // Menghitung jumlah review dan rating rata-rata untuk produk dan jasa
        $productReviews = $approvedReviews->where('product_id', '!=', null);
        $serviceReviews = $approvedReviews->where('product_id', '!=',null);

        $productAvgRating = $productReviews->avg('rating');
        $serviceAvgRating = $serviceReviews->avg('service_rating');
    
        return view('admin.admin-home', compact('productReviews', 'serviceReviews', 'productAvgRating', 'serviceAvgRating'));
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

    public function searchReview(Request $request)
    {
        $status = $request->input('status');
        
        // Membuat query untuk memfilter berdasarkan status
        $reviews = Review::with('product', 'user')
                        ->when($status, function ($queryBuilder) use ($status) {
                            return $queryBuilder->where('status', $status);
                        })
                        ->paginate(5)
                        ->appends(['status' => $status]);

        return view('admin.admin-reviews', compact('reviews', 'status'));
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
