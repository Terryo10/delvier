<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{asset('demo/assets/images/icons/favicon.ico')}}">
    <script src="https://use.fontawesome.com/1fa6a4db8c.js"></script>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ea7ffde69e9320caac80261/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'demo/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('demo/assets/css/bootstrap.min.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('demo/assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('demo/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('demo/assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('demo/assets/vendor/fontawesome-free/css/all.min.css')}}">
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">
                        <div class="header-dropdown">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->

                        <div class="header-dropdown">
                          <div id="google_translate_element"></div>
                        </div><!-- End .header-dropown -->

                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <p class="welcome-msg">Welcome To delvier!! </p>

                        <div class="header-dropdown dropdown-expanded">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    @guest
                                        @else
                                        <li><a href="/home">MY ACCOUNT </a></li>
                                        <li><a href="/pendingorders ">Pending Orders </a></li>
                                    @endguest



                                    @guest
                                    <li><a href="/login" >LOG IN</a></li>
                                    <li><a href="/register" >REGISTER</a></li>
                                    @else
                                       <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                                    @endguest
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <a href="/" class="logo">
                            <img src="{{asset('demo/assets/images/logo.png')}}" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="{{route('search')}}" method="GET">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control"name="query" value="{{ request()->input('query')}}" placeholder="Search..." required>

                                    <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .headeer-center -->

                    <div class="header-right">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                        <div class="header-contact">
                            <span>Call us now</span>
                            <a href="tel:+263786294425"><strong>+(263)786 294 425</strong></a>
                        </div><!-- End .header-contact -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <span class="cart-count">{{ $quantity ?? 0 }}</span>
                            </a>

                            <div class="dropdown-menu" >
                                <div class="dropdownmenu-wrapper">
                                    <div class="dropdown-cart-products">
                                        @isset($cartitemsglobal)
                                        @forelse ($cartitemsglobal as $items)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                <a href="/product/{{$items->product['id']}}">{{$items->product['name']}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{$items->quantity}}</span>
                                                    x ${{$items->product['price']}}
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="/product/{{$items->product['id']}}" class="product-image">
                                                    <img src="/storage/product_images/{{$items->product['firstImage']}}" alt="product">
                                                </a>
                                                {{-- <a href="#" class="btn-remove" title="Remove Product"><i class="icon-cancel"></i></a> --}}
                                                <form class="resumeadd-form" action="/cart/delete" method="get">
															@csrf
															<input class="form-control" type="hidden" value="{{$items->id}}" name="cart_item_id">
															<button class="btn-remove" value="delete" title="Remove Product" type="submit"><i class="icon-cancel"></i></button>
													</form>
                                            </figure>
                                        </div><!-- End .product -->
                                         @empty

                                         @endforelse
                                         @endisset



                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">${{$totalwebglobal}}.00</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        @guest
                                        <a href="/login" class="btn">Login to continue</a>
                                            @else

                                            <a href="/cart" class="btn">View Cart</a>

                                        @endguest

                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="active"><a href="/">Home</a></li>
                            <li>
                                <a href="#" class="sf-with-ul">Categories</a>
                                <div class="megamenu megamenu-fixed-width">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="menu-title">
                                                    </div>
                                                    <ul>
                                                        @foreach ($categoryese as $item)
                                                    <li><a href="/categories/{{$item->id}}">{{$item->name}}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </div><!-- End .col-lg-6 -->

                                            </div><!-- End .row -->
                                        </div><!-- End .col-lg-8 -->
                                        <div class="col-lg-4">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="/demo/assets/images/menu-banner-2.jpg" alt="Menu banner">
                                                </a>
                                            </div><!-- End .banner -->
                                        </div><!-- End .col-lg-4 -->
                                    </div>
                                </div><!-- End .megamenu -->
                            </li>
                            <li><a href="/shopping">Shop</a></li>
                            <li><a href="/home">My Account</a></li>
                            @guest

                                @else
                                <li><a href="/pendingorders ">Pending Orders </a></li>
                                @endguest


                            <li><a href="/about">About Us</a></li>

                        </ul>
                    </nav>
                </div><!-- End .header-bottom -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        <main class="main">

            @include('inc.message')
            @yield('content')
        </main><!-- End .main -->

        <footer class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="widget widget-newsletter">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="widget-title">Subscribe newsletter</h4>
                                        <p>Get all the latest information on Events,Sales and Offers. Sign up for newsletter today</p>
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        {{-- <form action="#">
                                            <input type="email" class="form-control" placeholder="Email address" required>

                                            <input type="submit" class="btn" value="Subscribe">
                                        </form> --}}
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-md-9 -->

                        <div class="col-md-3 widget-social">
                            <div class="social-icons">
                                <a href="https://www.facebook.com/delvierinternational" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                                <a href="https://twitter.com/Delvier1" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="https://www.instagram.com/delvier_/" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="https://www.instagram.com/delvier_/" class="social-icon" target="_blank"><i class="icon-"></i></a>
                                 <a href="https://www.instagram.com/delvier_/" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>


                            </div><!-- End .social-icons -->
                        </div><!-- End .col-md-3 -->
                    </div><!-- End .row -->
                </div><!-- End .footer-top -->
            </div><!-- End .container -->

            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Contact Us</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Address:</span>216 Landros Mare Street Polokwane South Africa
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span>Toll Free <a href="tel:">+(263)786 294 425</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="mailto:info@delvier.com">info@delvier.com</a>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">My Account</h4>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-5">
                                                <ul class="links">
                                                    <li><a href="/about">About Us</a></li>
                                                    <li><a href="/shopping">Shop</a></li>
                                                    <li><a href="/home">My Account</a></li>
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-5">
                                                <ul class="links">
                                                    <li><a href="/home">Orders History</a></li>

                                                    <li><a href="/login">Login</a></li>
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-5 -->

                                <div class="col-md-7">
                                    <div class="widget">
                                        <h4 class="widget-title">Main Services</h4>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <ul class="links">
                                                    <li><a href="/privacy">Privacy Policy</a></li>
                                                    <li><a href="#">Online Shopping</a></li>
                                                    <li><a href="#">Delivery</a></li>


                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6">
                                                 <ul class="links">
                                                    <li><a href="https://www.facebook.com/designavezw/">Powered By DESIGNAVE</a></li>


                                                </ul>
                                                <!--End .col-sm-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-7 -->
                            </div><!-- End .row -->

                            <div class="footer-bottom">
                                <p class="footer-copyright">Delvier  &copy;  2020.  All Rights Reserved</p>

                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span>
                                        Mon - Sun 24/7
                                    </li>
                                </ul>
                                <img src="/demo/assets/images/payments.png" alt="payment methods" class="footer-payments">
                            </div><!-- End .footer-bottom -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active"><a href="/">Home</a></li>
                    <li>
                        <a href="#">Categories</a>
                        <ul>
                            <li><a href="/categories">GO TO CATEGORIES PAGE</a></li>
                            @foreach ($categoryese as $item)
                        <li><a href="/categories/{{$item->id}}">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li><a href="/home">My Account</a></li>
                    <li><a href="/shopping">Shop</a></li>
                    <li><a href="/about">About</a></li>


                    @guest
                       <li><a href="/login" >Login</a></li>
                       <li><a href="/register" >Register</a></li>

                       @else
                        <li><a href="/pendingorders ">Pending Orders </a></li>
                           <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                    @endguest

                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="https://www.facebook.com/delvierinternational" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                <a href="https://twitter.com/Delvier1" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                <a href="https://www.instagram.com/delvier_/" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>

            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->



    <!-- Add Cart Modal -->
    <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body add-cart-box text-center">
            <p>You've just added this product to the<br>cart:</p>
            <h4 id="productTitle"></h4>
            <img src="#" id="productImage" width="100" height="100" alt="adding cart image">
            <div class="btn-actions">
                <a href="/cart"><button class="btn-primary">Go to cart page</button></a>
                <a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a id="scroll-top" href="#top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{asset('demo/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('demo/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('demo/assets/js/plugins.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{asset('demo/assets/js/main.min.js')}}"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
        </script>
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
@include('cookieConsent::index')
</body>

</html>
