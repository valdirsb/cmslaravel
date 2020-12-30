<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('temas/tema1/css/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('temas/tema1/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('temas/tema1/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('temas/tema1/css/magnific-popup.css') }}">
    
    <link rel="stylesheet" href="{{ asset('temas/tema1/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('temas/tema1/css/style.css') }}">
  </head>
  <body>

  	<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
							<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> {{$front_config['fone']}}</a> 
							<a href="#"><span class="fa fa-paper-plane mr-1"></span> {{$front_config['email']}}</a>
						</p>
					</div>
					<div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
			    		</p>
		        </div>
					</div>
				</div>
			</div>
		</div>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="background: #00ff00">
	    <div class="container">
        <a class="navbar-brand" href="{{asset ('/'.$page->slug)}}">
          <img src="{{$front_config['image']}}" alt="{{$front_config['title']}}" >
        </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            @foreach ($customer->pages as $page)
              <li class="nav-item @yield($page->slug.'-active')"><a href="{{asset ('/'.$page->slug)}}" class="nav-link">{{$page->name}}</a></li>
            @endforeach
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	
	@yield('content-template')
	
	

    <footer class="ftco-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo"><a href="#">{{$front_config['title']}}</a></h2>
              <p>Siga nossas redes sóciais</p>
              <ul class="ftco-footer-social list-unstyled mt-2">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Mapa do Site</h2>
              <ul class="list-unstyled">
              @foreach ($customer->pages as $page)
                <li><a href="{{asset ('/'.$page->slug)}}"><span class="fa fa-chevron-right mr-2"></span>{{$page->name}}</a></li>
              @endforeach
              </ul>
            </div>
          </div>
          
          <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Alguma duvida?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map marker"></span><span class="text">{{$front_config['address']}}</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">{{$front_config['fone']}}</span></a></li>
	                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">{{$front_config['email']}}</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid px-0 py-5 bg-black">
      	<div class="container">
      		<div class="row">
	          <div class="col-md-12">
		
	            <p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Desenvolvido por <i class="fa fa-heart color-danger" aria-hidden="true"></i> <a href="https://vasan.com.br" target="_blank">vasan.com.br</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
      	</div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('temas/tema1/js/jquery.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/popper.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('temas/tema1/js/google-map.js') }}"></script>
  <script src="{{ asset('temas/tema1/js/main.js') }}"></script>
    
  </body>
</html>