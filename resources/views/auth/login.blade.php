<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login - Newest</title>
    <!-- CSS files -->
    <link rel="icon" href="{{ asset('assets/img/logo-ne-trnsp.png') }}" type="image/png">
    <link href="{{ asset('assets/css/tabler.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet"/>

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }

     img{
      display:block;
      width: 150px;
      padding-bottom:40px;
      margin:0 auto;
     }

     .btn{
      background-color:#F48647;
      font-weight:700;
     }

     .card {
        border-radius:10px;
        margin-left:20px;
        margin-right:20px;
     }

     body {
          background-color:#D9D9D9;
        }
     

    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{ asset('assets/js/demo-theme.min.js?1692870487')}}"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
          </a>
        </div>
        <div class="card card-md">
          <div class="card-body">
          @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                  </ul>
                </div>
            @endif
            <img src="{{ asset('assets/img/logo-transp.png')}}" alt="">
            <form action="" method="POST" autocomplete="off" novalidate>
              @csrf
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" class="form-control" placeholder="Enter username" autocomplete="off">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                </label>
                <div class="input-group input-group-flat">
                  <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" autocomplete="off">
                  <span class="input-group-text">
                      <a href="#" id="toggle-password" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                          <!-- Ikon mata -->
                          <svg id="toggle-icon" xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                              <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                          </svg>
                      </a>
                  </span>
                </div>
              </div>
              
              <div class="form-footer">
                <button type="submit" class="btn w-100">Login</button>
              </div>
              <div class="text-center text-secondary mt-3">
                Don't have account yet? <a href="{{ url('register') }}" tabindex="-1">Register</a>
              </div>
            </form>
          </div>
          
            
          </div>
        </div>
        
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{asset ('assets/js/demo.min.js?1692870487') }}" defer></script>
    <script>
      document.getElementById('toggle-password').addEventListener('click', function (e) {
          e.preventDefault();  // Mencegah aksi default dari tag <a>
          
          var passwordInput = document.getElementById('password');
          var icon = document.getElementById('toggle-icon');

          // Mengecek tipe input saat ini, jika password, ubah ke text
          if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
              icon.innerHTML = '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12a2 2 0 1 0 -4 0a2 2 0 0 0 4 0" /><path d="M3 3l18 18" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6" />';
          } else {
              // Kembali ke tipe password
              passwordInput.type = 'password';
              icon.innerHTML = '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />';
          }
      });
    </script>

  </body>
</html>