<!doctype html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
rel="stylesheet" crossorigin="anonymous" /> 
  <title>@yield('title', 'BikeTrek')</title> 
</head> 
<body> 
  <!-- header --> 
  <nav class="navbar navbar-expand-lg navbar-dark py-4" style="background-color: #000000;"> 
    <div class="container"> 
      <a class="navbar-brand" href="/">
        <img src="{{ asset('biketrek_logo.ico') }}" width="200" height="40" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs
target="#navbarNavAltMarkup" 
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> 
        <span class="navbar-toggler-icon"></span> 
      </button> 
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> 
        <div class="navbar-nav ms-auto"> 
          <a class="nav-link active" href="{{ route('product.index') }}"">Products</a>
          <a class="nav-link active" href="{{ route('cart.index') }}"">Cart</a>
        </div> 
      </div> 
    </div> 
  </nav> 
 


  <header class="masthead text-white text-center py-4" style="background-color: #69c072;"> 
    <div class="container d-flex align-items-center flex-column"> 
      <h2>@yield('subtitle', 'BikeTrek')</h2> 
    </div> 
  </header> 
  <!-- header --> 

  <div class="container my-4"> 
    @yield('content') 
  </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    crossorigin="anonymous"> 
    </script> 

 <!-- footer --> 
 <div class="copyright py-4 text-center text-black"> 
    <div class="container"> 
      <small> 
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank" 
          href="https://github.com/vaalmo"> 
          Valentina Morales 
        </a> 
      </small> 
    </div> 
  </div> 
  <!-- footer --> 


</body> 
</html> 