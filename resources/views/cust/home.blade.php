@extends('cust.layouts.header')
@section('home-content')

		@if(session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

	<section id="billboard">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

					<div class="main-slider pattern-overlay">
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">New Well Dressed</h2>
								<p>Enter a world of unrivaled style with our revolutionary hoodie! 
									Designed for trendsetters, 
									this hoodie combines modern aesthetics with exceptional premium quality. 
									Made from an ultra-soft and breathable material, this hoodie provides maximum comfort without compromising on style.</p>
							</div><!--banner-content-->
								<img src="{{asset('cust-assets/images/items/men1.png') }}" alt="banner" class="banner-image">
						</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">New Person New Desain</h2>
								<p>With edgy design details and bold color choices, 
									this hoodie is ready to be your fashion statement. 
									Great for pairing with jeans, joggers, or even worn over your favorite t-shirt, 
									this hoodie is the perfect choice for any occasion-from casual hangouts to outdoor adventures.</p>
							</div><!--banner-content-->
							<img src="{{asset('cust-assets/images/items/men2.png') }}" alt="banner" class="banner-image">
						</div><!--slider-item-->

					</div><!--slider-->

					<button class="next slick-arrow">
						<i class="icon icon-arrow-right"></i>
					</button>

				</div>
			</div>
		</div>

	</section>

	<section id="client-holder" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="logo-wrap">
						<div class="grid">
							<a href="#"><img src="{{ asset('cust-assets/images/logo1.png') }}" alt="client" width="200px"></a>
							<a href="#"><img src="{{ asset('cust-assets/images/logo2.png') }}" alt="client" width="200px"></a>
							<a href="#"><img src="{{ asset('cust-assets/images/logo3.png') }}" alt="client" width="200px"></a>
							<a href="#"><img src="{{ asset('cust-assets/images/logo4.png') }}" alt="client" width="180px"></a>
							<a href="#"><img src="{{ asset('cust-assets/images/logo5.png') }}" alt="client" width="180px"></a>
						</div>
					</div><!--image-holder-->
				</div>
			</div>
		</div>
	</section>

	<section id="woman" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Featured Newest - Woman</h2>
					</div>
					<div class="product-list" data-aos="fade-up">
						<div class="row">
							@foreach($products as $product)
								@if($product->gender_category === 'woman')
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<!-- Gambar produk -->
												<img src="{{ Storage::url('product_images/' . $product->image) }}"
													alt="{{ $product->name }}" 
													class="product-item" width="150">
													<!-- Tombol Chat WA dan Review -->
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
																<i class="fas fa-lock"></i> Login to Review
															</a>
														@endif
													</div>
											</figure>
											<figcaption>
												<h3>{{ $product->name }}</h3>
												<span>{{ $product->author }}</span>
												<div class="item-price">Rp.{{ $product->price }}</div>
											</figcaption>
										</div>
									</div>
								@endif
							@endforeach
						</div><!--row-->
					</div><!--product-list-->
				</div>
			</div>
		</div>
	</section>

	<section id="best-selling" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-8">

					<div class="row">

						<div class="col-md-6">
							<figure class="products-thumb">
								<img src="{{asset ('cust-assets/images/items/woman1.jpg')}}" alt="book" class="single-image">
							</figure>
						</div>

						<div class="col-md-6">
							<div class="product-entry">
								<h2 class="section-title divider">Desain Quality</h2>

								<div class="products-content">
									<div class="author-name">By Newest</div>
									<h3 class="item-title">Graffiti on Top</h3>
									<p>A crop top that combines modern style with a futuristic touch. Its gravity-inspired design gives it a unique and distinctive feel. Perfect for confident women who want to stand out.</p>
									
								</div>

							</div>
						</div>

					</div>
					<!-- / row -->

				</div>

			</div>
		</div>
	</section>

	<section id="man" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Featured Newest - Man</h2>
					</div>
					<div class="tab-content">
						<div id="all-genre" data-tab-content class="active">
							<div class="row">
								@foreach($products as $product)
									@if($product->gender_category === 'man')
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<img src="{{ Storage::url('product_images/' . $product->image) }}" alt="{{ $product->name }}" class="product-item" width="150">

												<!-- Tombol Chat WA dan Review -->
												<div class="product-buttons">
													<a 
														href="https://wa.me/6282251356040?text=Saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}%20dengan%20harga%20Rp.{{ $product->price }}%20apakah%20produk%20ini%20ready?" 
														class="btn-icon btn-chat" 
														target="_blank"
													>
														<i class="fab fa-whatsapp"></i> Chat WA
													</a>
													@if(Auth::check())
														<a href="{{ route('cust.review', ['id' => $product->id]) }}" class="btn-icon btn-review">
															<i class="fas fa-star"></i> Review
														</a>
													@else
														<a href="{{ route('login') }}" class="btn-icon btn-lock">
															<i class="fas fa-lock"></i> Login to Review
														</a>
													@endif
												</div>
											</figure>
											<figcaption>
												<h3>{{ $product->name }}</h3>
												<span>{{ $product->author }}</span>
												<div class="item-price">Rp.{{ $product->price }}</div>
											</figcaption>
										</div>
									</div>
									@endif
								@endforeach
							</div><!--row-->
						</div><!--tab-content-->
					</div><!--tab-->
				</div>
			</div>
		</div>
	</section>

	<section id="quotation" class="align-center py-5 my-5">
		<div class="inner-content">
			<h2 class="section-title divider">Quote of the day</h2>
			<blockquote data-aos="fade-up">
				<q>Fashion is not just about clothing, it’s about expressing who you are. With online shopping, you can express yourself anytime, anywhere.</q>
				<div class="author-name">Unknown</div>
			</blockquote>
		</div>
	</section>

	<section id="testimonial" class="align-center py-5 my-5">
		<div class="container">
			<h2 class="section-title divider" >What Our Happy Customers Say</h2>
			<div class="testimonials-slider" style="display: flex; gap: 30px; overflow-x: auto; padding: 60px;">
				@if($approvedReviews->isNotEmpty())
					@foreach($approvedReviews as $review)
						<div style="flex: 250px; background: #F3F2EC; padding: 25px; border-radius: 10px; box-shadow: 0 10px 10px rgba(0,0,0,0.4); text-align: center;">
							<img src="{{ Storage::url('product_images/' . $review->product->image) }}" 
								alt="{{ $review->product->name }}" 
								style="border-radius: 50%; margin-bottom: 15px; width: 70px; height: 70px; object-fit: cover;">
							<p style="font-size: 1rem; color: #555;">“{{ $review->comment }}”</p>
							<h4 style="font-size: 1.2rem; font-weight: bold; margin-top: 10px; color: #333;">
								{{ $review->user->name }}
							</h4>
							<small>Product: {{ $review->rating }} | Service: {{ $review->service_rating }}</small>
						</div>
					@endforeach
				@else
					<p class="text-center">No testimonials available yet.</p>
				@endif
			</div>
		</div>
	</section>

    <script>
    // Script untuk menghilangkan alert setelah 5 detik
    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease"; // Smooth transition
            alert.style.opacity = 0; // Fade out effect
            setTimeout(() => alert.remove(), 500); // Hapus elemen setelah efek fade out selesai
        }
    }, 1000); // 5000 ms = 5 detik
	</script>


	@include('cust.layouts.footer')
	@endsection