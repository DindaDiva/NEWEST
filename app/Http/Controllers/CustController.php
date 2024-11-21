<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UnauthorizedController;
use App\Http\Middleware\CheckRole;
use App\Models\Product;
use App\Models\Review;


class CustController extends Controller
{
    public function index() {
        $products = Product::all();  // Ambil data produk dari database
        return view('cust.home', compact('products'));  // Kirim ke view
    }
    

    public function reviewForm($id)
    {
        $product = Product::findOrFail($id); // Ambil produk berdasarkan ID
        return view('cust.review', compact('product'));
    }
    
    public function submitReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        $review = new Review();
        $review->product_id = $id;
        $review->user_id = auth()->id(); // ID user yang login
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->status = 'pending'; // Menunggu persetujuan admin
        $review->save();

        return redirect()->route('cust-home')->with('success', 'Your review has been submitted and is awaiting approval!');
    }
    
}
