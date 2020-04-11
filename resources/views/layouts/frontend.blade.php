<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">
	  <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{asset('lol/css/bootstrap-grid.css')}}" />
<link rel="stylesheet" href="{{asset('lol/css/icons.css')}}">
	<link rel="stylesheet" href="{{asset('lol/css/animate.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('lol/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('lol/css/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('lol/css/chosen.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('lol/css/colors/colors.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('lol/css/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('lol/font-awesome.min.css')}}" />
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
</head>
<body>
{{-- 
<div class="page-loading">
<img src="{{asset('lol/images/loader.gif')}}" alt="" />
</div> --}}

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo"><a href="index-2.html" title=""><img src="images/resource/logo.png" alt="" /></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
				<img src="{{asset('lol/images/icon.png')}}" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="{{asset('lol/images/icon2.png')}}" alt="" /> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
<a href="/cart" title="" class="post-job-btn">Shopping-Cart<i class="la la-shopping-cart"></i>{{ $quantity ?? 0 }}</a>
					
				@guest
					<ul class="account-btns">
					<li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
					<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
				</ul>
				@else
				<ul class="account-btns">
					<li class="signup-popup"><a title=""><i class="la la-key"></i> Logout</a></li>
					
				</ul>
				@endguest
			</div><!-- Btn Extras -->
			
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form>
			<div class="responsivemenu">
				<ul>
						<li class="menu-item">
							<a href="/" title="">Home</a>
							
						
						</li>
						<li class="menu-item">
							<a href="/home" title="">My Account</a>
							
						</li>
						<li class="menu-item">
							<a href="/categories" title="">Categories</a>
						</li>
						@guest
							@else
						<li class="menu-item">
							<a href="myshop" title="">My Shop</a>
						</li>
						@endguest
						
						<li class="menu-item-has-children">
							<a href="#" title="">Job</a>
							<ul>
								<li><a href="job_list_classic.html">Job List Classic</a></li>
								<li><a href="job_list_grid.html">Job List Grid</a></li>
								<li><a href="job_list_modern.html">Job List Modern</a></li>
								<li><a href="job_single1.html">Job Single 1</a></li>
								<li><a href="job_single2.html">Job Single 2</a></li>
								<li><a href="job-single3.html">Job Single 3</a></li>
							</ul>
						</li>

						
					</ul>
			</div>
		</div>
	</div>
	
	<header class="stick-top forsticky">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="index-2.html" title=""><img class="hidesticky" src="images/resource/logo.png" alt="" /><img class="showsticky" src="images/resource/logo10.png" alt="" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<a href="/cart" title="" class="post-job-btn">Shopping-Cart <i class="la la-shopping-cart"></i>{{ $quantity ?? 0 }}</a>
					<ul class="account-btns">
						@guest
								<li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
						<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
					
						@else
						

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
							<li ><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
						
						@endguest
					</ul>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li class="menu-item">
							<a href="/" title="">Home</a>
							
						</li>
						@guest
							
						@else

						<li class="menu-item">
							<a href="/home" title="">My Account</a>
							
						</li>
						@endguest
						
						<li class="menu-item">
							<a href="/categories" title="">Categories</a>
						</li>
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>
<div>
	
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(lol/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							@include('inc.message')
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@yield('content')
	
</div>

	<footer>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="about_widget">
								<div class="logo">
									<a href="/" title=""><img src="images/resource/logo.png" alt="" /></a>
								</div>
								<span>Collin Street West, Victor 8007, Australia.</span>
								<span>+1 246-345-0695</span>
								<span><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="137a7d757c53797c717b667d673d707c7e">[email&#160;protected]</a></span>
								<div class="social">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
									<a href="#" title=""><i class="fa fa-pinterest"></i></a>
									<a href="#" title=""><i class="fa fa-behance"></i></a>
								</div>
							</div><!-- About Widget -->
						</div>
					</div>
					<div class="col-lg-4 column">
						<div class="widget">
							<h3 class="footer-title">Frequently Asked Questions</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-6">
										<a href="#" title="">Privacy & Seurty </a>
										<a href="#" title="">Terms of Serice</a>
										<a href="#" title="">Communications </a>
										<a href="#" title="">Referral Terms </a>
										<a href="#" title="">Lending Licnses </a>
										<a href="#" title="">Disclaimers </a>	
									</div>
									<div class="col-lg-6">
										<a href="#" title="">Support </a>
										<a href="#" title="">How It Works </a>
										<a href="#" title="">For Employers </a>
										<a href="#" title="">Underwriting </a>
										<a href="#" title="">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 column">
						<div class="widget">
							<h3 class="footer-title">Find Jobs</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-12">
										<a href="#" title="">US Jobs</a>	
										<a href="#" title="">Canada Jobs</a>	
										<a href="#" title="">UK Jobs</a>	
										<a href="#" title="">Emplois en Fnce</a>	
										<a href="#" title="">Jobs in Deuts</a>	
										<a href="#" title="">Vacatures China</a>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="download_widget">
								<a href="#" title=""><img src="images/resource/dw1.png" alt="" /></a>
								<a href="#" title=""><img src="images/resource/dw2.png" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-line">
			<span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>

</div>

<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>User Login</h3>
		<span></span>
		<div class="select-user">
			
		</div>
		<form method="POST" action="{{ route('login') }}">
			@csrf
			<div class="cfield">
				<input name="email" type="text" placeholder="Email" />
				<i class="la la-user"></i>
				   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<div class="cfield">
				<input name="password" type="password" placeholder="Password" />
				<i class="la la-key"></i>
				  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<p class="remember-label">
				<input type="checkbox" name="cb" id="cb1"><label for="cb1" {{ old('remember') ? 'checked' : '' }}>Remember me</label>
			</p>
			<a href="#" title="">Forgot Password?</a>
			<button type="submit">Login</button>
		</form>
		<div class="extra-login">
			
		</div>
	</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Sign Up</h3>
		<div class="select-user">
			<span>Create your account today</span>
			
		</div>
		<form  method="POST" action="{{ route('register') }}">
			@csrf
			<div class="cfield">
				<input type="text" placeholder="Username" name="name" />
				<i class="la la-user"></i>
				 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<div class="cfield">
				<input type="text" placeholder="Email" name="email"/>
				<i class="la la-envelope-o"></i>
				  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			</div>
			<div class="cfield">
				<input type="password" name="password" placeholder="********" />
				 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				<i class="la la-key"></i>
			</div>
			<div class="cfield">
				<input type="password" name="password_confirmation" placeholder="Confirm Password" />
				<i class="la la-key"></i>
			</div>
			
			
			
			<button type="submit">Signup</button>
		</form>
		<div class="extra-login">
			
		</div>
	</div>
</div><!-- SIGNUP POPUP -->

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('lol/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('lol/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('lol/js/script.js')}}" type="text/javascript"></script>
<script src="{{asset('lol/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('lol/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('lol/js/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('lol/js/parallax.js')}}" type="text/javascript"></script>
<script src="{{asset('lol/js/select-chosen.js')}}" type="text/javascript"></script>
<script>


function increment(id) {

  var jj = document.getElementById('quantity'+id);
  var jk = parseInt(jj.value) + 1;

  // window.alert(jk)
  jj.value = jk;

  
}

function decrement(id) {

  var jj = document.getElementById('quantity'+id);

  if (parseInt(jj.value) > 1) {
      var jk = parseInt(jj.value) - 1;
       jj.value = jk;
  }else{
       window.alert("Product Quantity cannot be less than 1")
      jj.value = 1;
  }

 

  
}

// $(document).ready(function(){

//     var quantitiy=0;

//    $('.quantity-right-plus').click(function(e){
        
//         // Stop acting like a button
//         e.preventDefault();
//         // Get the field name
//         var quantity = parseInt($('#quantity').val());
        
//         // If is not undefined
            
//             $('#quantity').val(quantity + 1);

          
//             // Increment
        
//     });

//      $('.quantity-left-minus').click(function(e){
//         // Stop acting like a button
//         e.preventDefault();
//         // Get the field name
//         var quantity = parseInt($('#quantity').val());
        
//         // If is not undefined
      
//             // Increment
//             if(quantity>0){
//             $('#quantity').val(quantity - 1);
//             }
//     });
    
// });

</script>

</body>
</html>

