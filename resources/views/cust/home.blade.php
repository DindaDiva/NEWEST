@extends('cust.layouts.header')
@section('home-content')

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
								<h2 class="banner-title">Life of the Wild</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
							</div><!--banner-content-->
								<img src="{{asset('cust-assets/images/items/men1.png') }}" alt="banner" class="banner-image">
						</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Birds gonna be Happy</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
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
						<h2 class="section-title">Featured Books - Woman</h2>
					</div>
					<div class="product-list" data-aos="fade-up">
						<div class="row">
							@foreach($products as $product)
								@if($product->gender_category === 'woman')
									<div class="col-md-3">
										<div class="product-item">
											<figure class="product-style">
												<img src="{{ asset('storage/product_images/' . $product->image) }}" alt="Books" class="product-item" width="150">
												<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
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
								<h2 class="section-title divider">Best Selling Book</h2>

								<div class="products-content">
									<div class="author-name">By Timbur Hood</div>
									<h3 class="item-title">Birds gonna be happy</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet,
										libero ipsum enim pharetra hac.</p>
									<div class="item-price">$ 45.00</div>
									<div class="btn-wrap">
										<a href="#" class="btn-accent-arrow">shop it now <i
												class="icon icon-ns-arrow-right"></i></a>
									</div>
								</div>

							</div>
						</div>

					</div>
					<!-- / row -->

				</div>

			</div>
		</div>
	</section>

	<section id="man" class="bookshelf py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Popular Books - Man</h2>
					</div>
					<div class="tab-content">
						<div id="all-genre" data-tab-content class="active">
							<div class="row">
								@foreach($products as $product)
									@if($product->gender_category === 'man')
									<div class="col-md-3">
    <div class="product-item">
        <figure class="product-style">
            <img src="{{ asset('storage/product_images/' . $product->image) }}" alt="{{ $product->name }}" class="product-item" width="150">
            <!-- Tombol Chat WhatsApp -->
            <a href="https://wa.me/6282251356040?text=Saya%20tertarik%20dengan%20produk%20{{ urlencode($product->name) }}%20dengan%20harga%20Rp.{{ $product->price }} apakah produk ini ready?" class="add-to-cart" target="_blank">
                Chat WA
            </a>
        </figure>
        <figcaption>
            <h3>{{ $product->name }}</h3>
            <span>{{ $product->author }}</span>
            <div class="item-price">Rp.{{ $product->price }}</div>
            <!-- Tombol Review -->
            <a  class="btn btn-info mt-2">Review</a>
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

	<section id="quotation" class="align-center pb-5 mb-5">
		<div class="inner-content">
			<h2 class="section-title divider">Quote of the day</h2>
			<blockquote data-aos="fade-up">
				<q>“The more that you read, the more things you will know. The more that you learn, the more places
					you’ll go.”</q>
				<div class="author-name">Dr. Seuss</div>
			</blockquote>
		</div>
	</section>

	<section id="subscribe">
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-8">
					<div class="row">

						<div class="col-md-6">

							<div class="title-element">
								<h2 class="section-title divider">Subscribe to our newsletter</h2>
							</div>

						</div>
						<div class="col-md-6">

							<div class="subscribe-content" data-aos="fade-up">
								<p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit
									adipiscing enim pharetra hac.</p>
								<form id="form">
									<input type="text" name="email" placeholder="Enter your email addresss here">
									<button class="btn-subscribe">
										<span>send</span>
										<i class="icon icon-send"></i>
									</button>
								</form>
							</div>

						</div>

					</div>
				</div>

			</div>
		</div>
	</section>

	@include('cust.layouts.footer')
	@endsection