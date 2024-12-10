<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Register - Newest</title>
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

              @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif

              <img src="{{ asset('assets/img/logo-transp.png')}}" alt="">

              <form action="{{ route('register') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <div class="mb-3">
                  <label class="form-label">@lang('bahasa.name2')</label>
                  <input name="name" class="form-control" placeholder="@lang('bahasa.name1')" autocomplete="off">
                </div>

                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input name="username" class="form-control" placeholder="@lang('bahasa.username')" autocomplete="off">
                </div>

                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input name="email" class="form-control" placeholder="@lang('bahasa.email')" autocomplete="off">
                </div>

                <div class="mb-3">
                  <label class="form-label">@lang('bahasa.phone')</label>
                  <input name="phone" class="form-control" placeholder="@lang('bahasa.number')" autocomplete="off">
                </div>

                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <div class="input-group input-group-flat">
                    <input id="password" name="password" type="password" class="form-control" placeholder="@lang('bahasa.password')" autocomplete="off">
                    <span class="input-group-text">
                      <a href="#" class="toggle-password link-secondary" title="Show password" data-bs-toggle="tooltip">
                        <svg class="icon toggle-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                          <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                      </a>
                    </span>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label">@lang('bahasa.confirm') Password</label>
                  <div class="input-group input-group-flat">
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="@lang('bahasa.confirm') password" autocomplete="off">
                    <span class="input-group-text">
                      <a href="#" class="toggle-password link-secondary" title="Show password" data-bs-toggle="tooltip">
                        <svg class="icon toggle-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                          <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                      </a>
                    </span>
                  </div>
                </div>

                <div class="form-footer">
                  <button type="submit" class="btn w-100">@lang('bahasa.register')</button>
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
        document.querySelectorAll('.toggle-password').forEach(button => {
          button.addEventListener('click', function (e) {
            e.preventDefault();

            const input = this.closest('.input-group').querySelector('input');
            const icon = this.querySelector('.toggle-icon');

            if (input.type === 'password') {
              input.type = 'text';
              icon.innerHTML = '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12a2 2 0 1 0 -4 0a2 2 0 0 0 4 0" /><path d="M3 3l18 18" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6" />';
            } else {
              input.type = 'password';
              icon.innerHTML = '<path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />';
            }
          });
        });
    </script>
  </body>
</html>