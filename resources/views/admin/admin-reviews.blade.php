@extends('admin.admin-layouts.admin-header')
@section('home-content')


<div class="container mt-5">
    <h1 class="mb-4">Reviews Management</h1>

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
        <div class="col-md-6 text-right">
            <select class="form-control">
                <option>Latest</option>
                <option>Highest Rated</option>
                <option>Lowest Rated</option>
            </select>
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
            <!-- Sample Row 1 -->
            <tr>
                <td>Kain Sasirangan Motif Awan</td>
                <td>John Doe</td>
                <td>5 / 5</td>
                <td>Sangat puas dengan kualitas produk ini, sangat direkomendasikan!</td>
                <td><span class="badge badge-success">Approved</span></td>
                <td>
                    <button class="btn btn-sm btn-success">Approve</button>
                    <button class="btn btn-sm btn-danger">Reject</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination (statis) -->
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>


@include('admin.admin-layouts.admin-footer')
@endsection

