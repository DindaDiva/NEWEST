<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; 




class ProductsController extends Controller
{
//function produk

    // Menampilkan seluruh data product terbaru
    function product() {
        $products = Product::latest()->paginate(5);
        return view('admin.admin-products', compact('products'));
       
    }

            // Menyimpan produk baru
            public function store(Request $request)
            {
                    $validatedData = $request->validate([
                        'kode_produk' => 'required|string|max:255',
                        'name' => 'required|string|max:255',
                        'description' => 'required',
                        'price' => 'required|numeric',
                        'type' => 'required|in:atasan,bawahan',
                        'gender_category' => 'required|in:woman,man',
                        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                    ]);
            
                    $imagePath = null;
                    if ($request->hasFile('image')) {
                        $imagePath = $request->file('image')->store('product_images', 'public');
                        $validatedData['image'] = $imagePath;
                    }

                    Product::create($validatedData);
            
                    return redirect()->route('admin-products')->with('success', 'Product added successfully.');
            }
        
            // Menampilkan data produk untuk diedit
            public function edit($id)
            {
                $product = Product::findOrFail($id); // Ambil data produk berdasarkan ID
                return view('admin.admin-products', compact('product')); // Tampilkan form edit
            }
        
            // Memperbarui data produk
            public function update(Request $request, $id)
            {
                $validatedData = $request->validate([
                    'kode_produk' => 'required|string|max:255',
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'price' => 'required|numeric',
                    'type' => 'required|string|max:255',
                    'gender_category' => 'required|string|max:255', // Pastikan ini sesuai dengan pilihan
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
        
                $product = Product::findOrFail($id);

                // Update data produk
                $product->kode_produk = $validatedData['kode_produk'];
                $product->name = $validatedData['name'];
                $product->description = $validatedData['description'];
                $product->price = $validatedData['price'];
                $product->type = $validatedData['type'];
                $product->gender_category = $validatedData['gender_category'];
        
                // Jika ada gambar baru yang di-upload, simpan dan hapus gambar lama
                if ($request->hasFile('image')) {
                    // Hapus gambar lama jika ada
                    if ($product->image) {
                        \Storage::delete('public/product_images/' . $product->image);
                    }
        
                    // Simpan gambar baru
                    $image = $request->file('image');
                    $filename = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/product_images', $filename);
                    $product->image = $filename;
                }
        
                $product->save();
        
                return redirect()->route('admin-products')->with('success', 'Product updated successfully!');
            }
        
            // Menghapus produk
            public function destroy($id)
            {
                $product = Product::findOrFail($id);

                // Hapus gambar jika ada
                if ($product->image) {
                    Storage::delete('public/product_images/' . $product->image);
                }

                // Hapus produk dari database
                $product->delete();

                return redirect()->route('admin-products')->with('success', 'Product successfully deleted!');
            }

             public function search(Request $request)
            {
                $query = $request->input('query');
    
                // Menjalankan pencarian dengan pagination
                $products = Product::where('name', 'LIKE', "%{$query}%")
                                   ->paginate(5)
                                   ->appends(['query' => $query]);
            
                return view('admin.admin-products', compact('products', 'query'));
            }




          

           
}
