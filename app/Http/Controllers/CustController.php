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
use App\Models\ProductImage;
use App\Models\Review;
use Stichoza\GoogleTranslate\GoogleTranslate;



class CustController extends Controller
{
    public function index() 
    {
        $products = Product::all();  

        $approvedReviews = Review::with('user', 'product')
                            ->where('status', 'approved')
                            ->latest()
                            ->get();
                            
        return view('cust.home', compact('products', 'approvedReviews'));
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
            'service_rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        $review = new Review();
        $review->product_id = $id;
        $review->user_id = auth()->id(); // ID user yang login
        $review->rating = $request->rating;
        $review->service_rating = $request->service_rating;
        $review->comment = $request->comment;
        $review->status = 'pending'; // Menunggu persetujuan admin
        $review->save();

        return redirect()->route('cust-home')->with('success', 'Your review has been submitted and is awaiting approval!');
    }


    public function detail($id)
    {
       // Ambil data produk dari database
        $product = Product::findOrFail($id);

        // Tentukan bahasa untuk terjemahan
        $language = session('locale', 'en'); // Default ke bahasa Inggris jika tidak ada session

        // Menggunakan Google Translate untuk menerjemahkan nama dan deskripsi produk
        $translator = new GoogleTranslate($language);  // 'en' untuk Inggris, 'id' untuk Indonesia

        $product->description_id = $translator->translate($product->description);
        $product->type_id = $translator->translate($product->type);
        $product->material_id = $translator->translate($product->material);
        $product->gender_id = $translator->translate($product->gender_category);


        

        return view('cust.detail', compact('product'));
    }
   

    
    
}
