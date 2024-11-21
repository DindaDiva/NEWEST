@extends('admin.admin-layouts.admin-header')
@section('home-content')


<div class="container mt-5">
    <h1 class="mb-4">Reviews Management</h1>

    
        @if(session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info" id="info-alert">
                {{ session('info') }}
            </div>
        @endif

    <!-- Search bar dan filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search reviews...">
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar review -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">User</th>
                <th scope="col">Rating</th>
                <th scope="col">Review</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->product->name }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->rating }} / 5</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        @if ($review->status == 'approved')
                            <span class="badge badge-success">Approved</span>
                        @elseif ($review->status == 'rejected')
                            <span class="badge badge-danger">Rejected</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        <!-- Tombol untuk Approve/Reject -->
                        @if ($review->status == 'pending')
                            <form action="{{ route('admin.approve-review', $review->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                            <form action="{{ route('admin.reject-review', $review->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-info">Reject</button>
                            </form>
                        @endif
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $review->id }}">Delete</button>
                    </td>
                </tr>


                        <div class="modal fade" id="deleteModal{{ $review->id }}"  tabindex="-1" aria-labelledby="deleteProductModalLabel{{ $review->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProductModalLabel{{ $review->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus review?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.delete-review', $review->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        </div>


            @endforeach
        </tbody>
    </table>

    <!-- Pagination (statis) -->
    <nav>
        <div class="d-flex justify-content-center">
            {{ $reviews->links() }}
         </div>
    </nav>
    
</div>


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

