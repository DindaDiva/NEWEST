@extends('cust.layouts.header')
@section('home-content')

<div class="container mt-5">
    <h1>Review @lang('bahasa.title_product'): {{ $product->name }}</h1>

    <!-- Form untuk menambahkan review produk -->
    <form action="{{ route('product.review', $product->id) }}" method="POST">
        @csrf
        <!-- Rating Produk -->
        <div class="form-group mt-3">
            <label for="rating" class="form-label">@lang('bahasa.rating_product') (1-5)</label>
            <select id="rating" name="rating" class="form-control" required>
                <option value="5">5 - @lang('bahasa.excellent')</option>
                <option value="4">4 - @lang('bahasa.good')</option>
                <option value="3">3 - @lang('bahasa.average')</option>
                <option value="2">2 - @lang('bahasa.poor')</option>
                <option value="1">1 - @lang('bahasa.terrible')</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="service_rating" class="form-label">@lang('bahasa.rating_service') (1-5)</label>
            <select id="service_rating" name="service_rating" class="form-control" required>
                <option value="5">5 - @lang('bahasa.excellent')</option>
                <option value="4">4 - @lang('bahasa.good')</option>
                <option value="3">3 - @lang('bahasa.average')</option>
                <option value="2">2 - @lang('bahasa.poor')</option>
                <option value="1">1 - @lang('bahasa.terrible')</option>
            </select>
        </div>

        <!-- Komentar Produk -->
        <div class="form-group mt-3">
            <label for="comment" class="form-label">@lang('bahasa.your_review')</label>
            <textarea id="comment" name="comment" rows="5" class="form-control" placeholder="@lang('bahasa.write')" required></textarea>
        </div>

        <!-- Tombol Submit untuk Review Produk -->
        <button type="submit" class="btn-icon btn-chat">@lang('bahasa.submit') Review</button>
    </form>
</div>

@include('cust.layouts.footer')
@endsection