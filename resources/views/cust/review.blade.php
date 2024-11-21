@extends('cust.layouts.header')
@section('home-content')

<div class="container mt-5">
    <h1>Review Product: {{ $product->name }}</h1>

    <!-- Form untuk menambahkan review produk -->
    <form action="{{ route('product.review', $product->id) }}" method="POST">
        @csrf
        <!-- Rating Produk -->
        <div class="form-group mt-3">
            <label for="product_rating" class="form-label">Product Rating (1-5)</label>
            <select id="product_rating" name="product_rating" class="form-control" required>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Good</option>
                <option value="3">3 - Average</option>
                <option value="2">2 - Poor</option>
                <option value="1">1 - Terrible</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="service_rating" class="form-label">Service Rating (1-5)</label>
            <select id="service_rating" name="service_rating" class="form-control" required>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Good</option>
                <option value="3">3 - Average</option>
                <option value="2">2 - Poor</option>
                <option value="1">1 - Terrible</option>
            </select>
        </div>

        <!-- Komentar Produk -->
        <div class="form-group mt-3">
            <label for="comment" class="form-label">Your Review</label>
            <textarea id="comment" name="comment" rows="5" class="form-control" placeholder="Write your review here..." required></textarea>
        </div>

        <!-- Tombol Submit untuk Review Produk -->
        <button type="submit" class="btn-icon btn-chat">Submit Review</button>
    </form>
</div>

@include('cust.layouts.footer')
@endsection