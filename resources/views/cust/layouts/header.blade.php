<!DOCTYPE html>
<html lang="en">

<head>
	<title>Newest - New Est Cloth Store</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{ asset('cust-assets/css/normalize.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('cust-assets/icomoon/icomoon.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('cust-assets/css/vendor.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('cust-assets/css/style.css') }}">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

	<div id="header-wrap">

		<header id="header">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-2">
						<div class="main-logo">
							<a href="{{ url('home')}}" 	><img src="{{ asset('cust-assets/images/logo-transp.png')}}" alt="logo" width="150px" ></a>
						</div>

					</div>

					<div class="col-md-10">

						<nav id="navbar">
							<div class="main-menu stellarnav">
								<ul class="menu-list">
									<li class="menu-item active"><a href="#home">Home</a></li>
									<li class="menu-item"><a href="#featured-books" class="nav-link">Woman</a></li>
									<li class="menu-item"><a href="#popular-books" class="nav-link">Man</a></li>
									<li class="menu-item dropdown">
										@if(Auth::check())
											<!-- Nama pengguna sebagai tombol dropdown -->
											<a href="#" 
											class="nav-link btn btn-outline-dark rounded-pill m-0 dropdown-toggle" 
											id="userDropdown" 
											role="button" 
											data-bs-toggle="dropdown" 
											aria-expanded="false">
												{{ Auth::user()->name }}
											</a>
											
											<!-- Menu Dropdown -->
											<ul class="dropdown-menu" aria-labelledby="userDropdown">
												<li>
													<a href="{{ route('logout') }}" 
													class="dropdown-item" 
													onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
														Logout
													</a>
												</li>
											</ul>
											
											<!-- Form Logout -->
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
										@else
											<!-- Tombol Login -->
											<a href="{{ route('login') }}" class="nav-link btn btn-outline-dark rounded-pill m-0">Login</a>
										@endif
									</li>
								</ul>

								<div class="hamburger">
									<span class="bar"></span>
									<span class="bar"></span>
									<span class="bar"></span>
								</div>

							</div>
						</nav>

					</div>

				</div>
			</div>
		</header>

	</div><!--header-wrap-->

    
    <div class="container-fluid">
        @yield('home-content')
      </div>


	<div class="container-fluid">
        @yield('footer')
    </div>