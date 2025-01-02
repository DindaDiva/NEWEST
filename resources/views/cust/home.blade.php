@extends('cust.layouts.header')
@section('home-content')

		@if(session('success'))
            <div class="alert alert-success" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

		<div>
			<a href="locale/en">English</a> |
			<a href="locale/id">Bahasa Indonesia</a>
		</div>


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
								<h2 class="banner-title">@lang('bahasa.profile1')</h2>
								<p>@lang('bahasa.profile2')</p>
								<p>
									<a href="https://maps.app.goo.gl/C7fpSuVwAH7CTuoW7"
										target="_blank" 
										class="btn-animated">
											@lang('bahasa.lokasi')
										<span class="arrow">→</span>
									</a>
								</p>
							</div><!--banner-content-->
								<div id="lottie-container" style="width: 500px; height: 500px; margin: 80px 0 0 0;"></div>
							</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">@lang('bahasa.title1')</h2>
								<p>@lang('bahasa.desc1')</p>
							</div><!--banner-content-->
								<img src="{{asset('cust-assets/images/items/men1.png') }}" alt="banner" class="banner-image">
						</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">@lang('bahasa.title2')</h2>
								<p>@lang('bahasa.desc2')</p>
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
							<span>@lang('bahasa.quality')</span>
						</div>
						<h2 class="section-title">@lang('bahasa.title_wmn')</h2>
					</div>
					<div class="product-list" data-aos="fade-up">
						<div class="row">
							@foreach($products as $product)
								@if($product->gender_category === 'woman')
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<!-- Gambar produk -->

												<a href="{{ route('cust.detail', $product->id) }}">
													@if ($product->images->isNotEmpty())
														<img src="{{ Storage::url('product_images/' . $product->images->first()->image_path) }}" 
															alt="{{ $product->name }}" 
															class="product-item" width="150">
													@else
														<p>@lang('bahasa.pict')</p>
													@endif
												</a>
												
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
																<i class="fas fa-lock"></i> @lang('bahasa.review')
															</a>
														@endif
													</div>
											</figure>
											<figcaption>
												<h3>{{ $product->name }}</h3>
												<span>{{ $product->author }}</span>
												<div class="item-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
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
								<h2 class="section-title divider">@lang('bahasa.title_quality')</h2>

								<div class="products-content">
									<div class="author-name">@lang('bahasa.title_author')</div>
									<h3 class="item-title">@lang('bahasa.title_item')</h3>
									<p>@lang('bahasa.desc3')</p>
									
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
							<span>@lang('bahasa.quality')</span>
						</div>
						<h2 class="section-title">@lang('bahasa.title_mn')</h2>
					</div>
					<div class="tab-content">
						<div id="all-genre" data-tab-content class="active">
							<div class="row">
								@foreach($products as $product)
									@if($product->gender_category === 'man')
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">

												<a href="{{ route('cust.detail', $product->id) }}">
													@if ($product->images->isNotEmpty())
														<img src="{{ Storage::url('product_images/' . $product->images->first()->image_path) }}" 
															alt="{{ $product->name }}" 
															class="product-item" width="150">
													@else
														<p>@lang('bahasa.pict')</p>
													@endif
												</a>

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
															<i class="fas fa-lock"></i> @lang('bahasa.review')
														</a>
													@endif
												</div>
											</figure>
											<figcaption>
												<h3>{{ $product->name }}</h3>
												<span>{{ $product->author }}</span>
												<div class="item-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
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
			<h2 class="section-title divider">@lang('bahasa.quote')</h2>
			<blockquote data-aos="fade-up">
				<q>@lang('bahasa.desc4')</q>
				<div class="author-name">@lang('bahasa.quote_author')</div>
			</blockquote>
		</div>
	</section>

	<section id="testimonial" class="align-center py-5 my-5">
		<div class="container">
			<h2 class="section-title divider" >@lang('bahasa.title_review')</h2>
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
							<small>@lang('bahasa.title_product'): {{ $review->rating }} | @lang('bahasa.title_service'): {{ $review->service_rating }}</small>
						</div>
					@endforeach
				@else
					<p class="text-center">@lang('bahasa.no_testi')</p>
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

	<script>
		// Load animasi Lottie JSON
		var animation = lottie.loadAnimation({
			container: document.getElementById('lottie-container'), // ID container animasi
			renderer: 'svg', // Jenis renderer (svg/canvas/html)
			loop: true, // Animasi berulang
			autoplay: true, // Animasi otomatis dimulai
			path: '{{ asset("assets/json/animated.json") }}' // Path ke file JSON
		});
	</script>

	@include('cust.layouts.footer')
	@endsection