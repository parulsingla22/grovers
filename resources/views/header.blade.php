<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{URL::asset('assets/css/open-iconic-bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/animate.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/aos.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap-datepicker.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/jquery.timepicker.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/flaticon.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/icomoon.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/front.css')}}" type="text/css">
			<!--ajax links-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<!--end of ajax links-->
	</head>
	<body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
		</div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Grovers</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				
			@guest
				<li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
				@if (Route::has('register'))
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endif
					@else
							<li class="nav-item">
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();" class="nav-link">
									Logout
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</li>
			@endguest
			@foreach($menu as $data)
			@if($data->menuid=='0')
				<li class="nav-item "><a href="{{ route($data->ref) }}" class="nav-link">{{$data->item}}</a></li>
			@elseif($data->menuid=='d')
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$data->item}}</a>
				  <div class="dropdown-menu" aria-labelledby="dropdown04">
					@foreach($menu as $itemdrop)
						@if($itemdrop->menuid==$data->id)
							<a class="dropdown-item" href="{{ route($itemdrop->ref) }}">{{$itemdrop->item}}</a>
						@endif
					@endforeach
				  </div>
				</li>         
			@endif
			@endforeach
			    <li class="nav-item cta cta-colored">
					<a class="nav-link" href="{{route('cart.checkout')}}">
                        
					@guest	
						@else
					
						<!--span>{{Cart::session(auth()->user()->id)->getTotalQuantity()}}</span-->
						<span class="icon-shopping_cart">
						@if(isset($cartcount1))
						{{$cartcount1}}
						@else
						{{0}}
						@endif
						</span>
					@endguest	
					</a>
				</li> 
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

