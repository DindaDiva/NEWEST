<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
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
                // Validasi input
                $validatedData = $request->validate([
                    'kode_produk' => 'required|string|max:255',
                    'name' => 'required|string|max:255',
                    'description' => 'required',
                    'price' => 'required|numeric',
                    'type' => 'required|in:atasan,bawahan',
                    'material' => 'nullable|string|max:255',
                    'size' => 'nullable|string|max:255',
                    'gender_category' => 'required|in:woman,man',
                    'image.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                ]);

                // Simpan data produk ke tabel products
                $product = Product::create([
                    'kode_produk' => $validatedData['kode_produk'],
                    'name' => $validatedData['name'],
                    'description' => $validatedData['description'],
                    'price' => $validatedData['price'],
                    'type' => $validatedData['type'],
                    'material' => $validatedData['material'] ?? null,
                    'size' => $validatedData['size'] ?? null,
                    'gender_category' => $validatedData['gender_category'],
                ]);

                // Simpan gambar ke tabel product_images
                if ($request->hasFile('image')) {
                    foreach ($request->file('image') as $image) {
                        $imagePath = $image->store('product_images', 'public');

                        // Simpan data gambar ke tabel product_images
                        ProductImage::create([
                            'product_id' => $product->id,
                            'image_path' => basename($imagePath),
                        ]);
                    }
                }

        

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
                    'type' => 'required|in:atasan,bawahan',
                    'material' => 'nullable|string|max:255',
                    'size' => 'nullable|string|max:255',
                    'gender_category' => 'required|string|max:255',
                    'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                ]);

                // Ambil produk berdasarkan ID
                $product = Product::with('images')->findOrFail($id);

                // Update data produk
                $product->update($validatedData);

                // Kelola gambar baru
                if ($request->hasFile('images')) {
                    // Hapus gambar lama
                    foreach ($product->images as $image) {
                        \Storage::delete('public/product_images/' . $image->image_path);
                        $image->delete();
                    }

                    // Simpan gambar baru
                    foreach ($request->file('images') as $uploadedImage) {
                        $imagePath = $uploadedImage->store('product_images', 'public');
                        $product->images()->create(['image_path' => basename($imagePath)]);
                    }
                }

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
                $products = Product::where('kode_produk', 'like', "%{$query}%")
                                    ->orWhere('name', 'like', "%{$query}%")
                                    ->orWhere('type', 'like', "%{$query}%")
                                    ->orWhere('gender_category', 'like', "%{$query}%")
                                    ->paginate(5)
                                    ->appends(['query' => $query]);

                return view('admin.admin-products', compact('products', 'query'));
            }




          

           
}
