@extends('admin.admin-layouts.admin-header')
@section('home-content')

    <div class="container mt-5">
        <h1 class="mb-4">Products Management</h1>

        @if(session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mb-4">
            <div class="col-md-6">   
                <div class="input-group">
                        <input type="text"  name="query" value="{{ request('query') }}" class="form-control" placeholder="Search product...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"  >Search</button>
                        </div>
                </div> 
            </div>
            <div class="col-md-6">
                <a href="" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</a>
            </div>
        </div>

        <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Kode Produk</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga (Rp)</th>
                        <th>Jenis</th>
                        <th>Gender</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->kode_produk }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->type }}</td>
                            <td>{{ $product->gender_category }}</td>
                            <td><img src="{{ asset('storage/product_images/' . $product->image) }}" width="100" alt="Gambar {{ $product->name }}"></td>
                            <td>
                                <!-- Tombol Edit mengarah ke modal yang sesuai -->
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">Edit</a>
                                <!-- Tombol Hapus mengarah ke modal hapus yang sesuai -->
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">Hapus</a>                  
                            </td>
                        </tr>

                    <!-- Modal untuk Edit Produk -->
                        <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('products-update', $product->id) }}" method="POST" enctype="multipart/form-data" >
                                        @csrf
                                        @method('PUT')

                                            <div class="mb-3">
                                                <label for="editProductCode" class="form-label">Kode Produk</label>
                                                <input type="text" name="kode_produk" class="form-control" value="{{ old('kode_produk', $product->kode_produk) }}" id="editProductCode" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editProductName" class="form-label">Nama Produk</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" id="editProductName" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editProductDescription" class="form-label">Deskripsi Produk</label>
                                                <textarea name="description" class="form-control" id="editProductDescription" rows="3">{{ old('description', $product->description) }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editProductPrice" class="form-label">Harga Produk</label>
                                                <input type="number" name="price" class="form-control" id="editProductPrice" value="{{ old('price', $product->price) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="productType">Jenis</label>
                                                    <select class="form-control" id="type" name="type">
                                                        <option value="Atasan" {{ old('type', $product->type) == 'Atasan' ? 'selected' : '' }}>Atasan</option>
                                                        <option value="Bawahan" {{ old('type', $product->type) == 'Bawahan' ? 'selected' : '' }}>Bawahan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="productGender">Gender</label>
                                                    <select class="form-control" id="gender_category" name="gender_category">
                                                        <option value="woman" {{ old('gender_category', $product->gender_category) == 'woman' ? 'selected' : '' }}>Wanita</option>
                                                        <option value="man" {{ old('gender_category', $product->gender_category) == 'man' ? 'selected' : '' }}>Pria</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editProductImage" class="form-label">Ganti Gambar Produk</label>
                                                <input type="file" name="image" class="form-control" id="editProductImage">
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/product_images/' . $product->image) }}" width="100" alt="Gambar {{ $product->name }}">
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Product</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal untuk Hapus Produk -->
                        <div class="modal fade" id="deleteModal{{ $product->id }}"  tabindex="-1" aria-labelledby="deleteProductModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProductModalLabel{{ $product->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus produk <strong>{{ $product->name }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('products-destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        </div>

                    @endforeach
                </tbody>
        </table>
    </div>

    <!-- Modal untuk Tambah Produk -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductModal" action="{{ route('product-store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="productCode" class="form-label">Kode Produk</label>
                            <input type="text" id="kode_produk" name="kode_produk" class="form-control" placeholder="Masukkan kode produk">
                        </div>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Nama Produk</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama produk">
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi produk"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga produk">
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="productType">Jenis</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="atasan" {{ (isset($product) && $product->type == 'atasan') ? 'selected' : '' }}>Atasan</option>
                                    <option value="bawahan" {{ (isset($product) && $product->type == 'bawahan') ? 'selected' : '' }}>Bawahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="productGender">Gender</label>
                                <select class="form-control" id="gender_category" name="gender_category">
                                    <option value="woman" {{ (isset($product) && $product->gender_category == 'woman') ? 'selected' : '' }}>Wanita</option>
                                    <option value="man" {{ (isset($product) && $product->gender_category == 'man') ? 'selected' : '' }}>Pria</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Upload Gambar Produk</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <nav>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
         </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Script untuk menghilangkan alert setelah 5 detik
    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease"; // Smooth transition
            alert.style.opacity = 0; // Fade out effect
            setTimeout(() => alert.remove(), 500); // Hapus elemen setelah efek fade out selesai
        }
    }, 5000); // 5000 ms = 5 detik
    </script>
    
    
@include('admin.admin-layouts.admin-footer')
@endsection

