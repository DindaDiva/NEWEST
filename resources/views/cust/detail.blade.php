@extends('cust.layouts.header')
@section('home-content')

<body>
    <div class="container mt-5">
        <div class="row">

            <!-- Bagian kiri: Gambar Produk -->
            <div class="col-md-6">

                <button class="prev slick-arrow1">
                    <i class="icon icon-arrow-left"></i>
                </button>

                <!-- Slider Gambar Produk -->
                <div class="main-slider pattern-overlay">
                    
                    @foreach($product->images as $key => $image)
                    <div class="slider-item">
                        <img src="{{ asset('storage/product_images/' . $image->image_path) }}" class="product-image" alt="Product Image">
                    </div>
                    @endforeach
                </div><!--main-slider-->

                <button class="next slick-arrow1">
                    <i class="icon icon-arrow-right"></i>
                </button>

            </div>

            <!-- Bagian kanan: Detail Produk -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1>{{ $product->name}}</h1>
                    <p class="product-description">{{$product->description_id}}</p>
                    <p class="product-price">Rp. {{ number_format($product->price) }}</p>

                    <!-- Menampilkan informasi tambahan jika ada -->
                    <ul class="list-group">
                        <li class="list-group-item"><strong>@lang('bahasa.kat'):</strong> {{ $product->type_id }}</li>
                        <li class="list-group-item"><strong>@lang('bahasa.bhn'):</strong> {{ $product->material_id}}</li>
                        <li class="list-group-item"><strong>@lang('bahasa.uk'):</strong> {{ $product->size }}</li>
                        <li class="list-group-item"><strong>@lang('bahasa.gender'):</strong> {{ ucfirst($product->gender_id) }}</li>
                    </ul>

                    <!-- Tombol aksi -->
                    <div class="mt-3">
                        <div class="product-buttons">
							<a 
								href="https://wa.me/6282251356040?text=Saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}%20dengan%20harga%20Rp.{{ $product->price }}%20apakah%20produk%20ini%20ready?" 
								class="btn-icon btn-chat" 
								target="_blank">
								<i class="fab fa-whatsapp"></i> Chat WA
							</a>
                                @if(Auth::check())
                                    <a href="{{ route('cust.review', ['id' => $product->id]) }}" class="btn-icon btn-review">
                                        <i class="fas fa-star"></i> Review
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn-icon btn-lock">
                                        <i class="fas fa-lock"></i> @lang('bahasa.review')
                                    </a>
                                @endif
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menyertakan Slick CSS dan JS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

    <!-- Menyertakan jQuery dan Slick JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    

</body>

@include('cust.layouts.footer')
@endsection

<style> 

.product-image {
    width: 90%;            
    height: 90%;          
    object-fit: contain;  
    display: block;       
    margin: 0 auto;     
}

.main-slider {
    max-width: 60%;        
    margin: 0 auto;        
    height: 500px;         
    position: relative;    
}
button.slick-arrow {
  border: 1px solid #E5E3DA;
  padding: initial;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  z-index: 5;
  cursor: pointer;
}
button.prev.slick-arrow1 {
  left: 10px;
}

button.next.slick-arrow1 {
  right: 10px;
}

/* Styling untuk detail produk */
.product-details {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

/* Hover effect pada detail produk */
.product-details:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px); 
}

/* Judul produk */
.product-title {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

/* Deskripsi produk */
.product-description {
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 20px;
}

/* Harga produk */
.product-price {
    font-size: 1.5rem;
    color: #28a745;
    font-weight: bold;
    margin-bottom: 20px;
}

.price-value {
    color: #000;
}

/* Styling untuk informasi tambahan */
.product-details .list-group-item {
    font-size: 1.1rem;
    color: #444;
    padding: 10px 8px 8px 10px;
    margin: 6px;
    border: 1px solid rgb(253, 161, 55) !important;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.list-group-item strong {
    color: #333;
    font-weight: 600;
}



</style>