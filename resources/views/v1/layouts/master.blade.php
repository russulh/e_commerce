<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="e-commerce website">
      <meta name="author" content="R.H.">

      <title>E-Commerce @yield('title')</title>
      {{-- <link rel="icon" type="image/png"  href="https://laravel.com/favicon.png"> --}}

      {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}

      <!-- Bootstrap core CSS -->
      <link href="/css/bootstrap.min.css" rel="stylesheet">

      {{-- Font Awesom --}}
      <link href="/css/font-awesome.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="/css/shop-homepage.css" rel="stylesheet">

      {{-- pagination --}}
      <link href="/css/pagination.css" rel="stylesheet">

      @yield('css')
   </head>
   <body>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="/">E-Commerce</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item @yield('home')">
                      <a class="nav-link" href="/">Home</a>
                  </li>

                  <li class="nav-item dropdown @yield('account')">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (Auth::guest())
                           Account
                        @else
                           {{ Auth::user()->first_name }}
                        @endif
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        @if (Auth::guest())
                           <a class="dropdown-item" href="/user/signin">Sign In</a>
                           <a class="dropdown-item" href="/user/signup">Sign Up</a>
                        @else
                           <a class="dropdown-item" href="/user/cart">Cart</a>
                           <a class="dropdown-item" href="/user/profile">Profile</a>
                           <a class="dropdown-item" href="/user/logout">Sign-Out</a>
                        @endif
                     </div>
                  </li>

              </ul>
          </div>
      </nav>


      @yield('contain')



      <!-- Footer -->
      {{-- <footer class="py-5 bg-dark">
         <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; E-Commerce 2017</p>
         </div>
      </footer> --}}

      <!-- Bootstrap core JavaScript -->
      <script src="/js/jquery.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>

      @yield('js')
   </body>
</html>
