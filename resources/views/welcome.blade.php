@extends('layouts.final')
@section('content')
   <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme owl-theme-light">
                    <div class="home-slide">
                        <div class="slide-bg owl-lazy"  data-src="/demo/assets/images/slider/slide-1.jpg"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="home-slide-content">
                                <div class="slide-border-top">
                                    <img src="/demo/assets/images/slider/border-top.png" alt="Border" width="290" height="38">
                                </div><!-- End .slide-border-top -->
                                <h3>80% off for select items</h3>
                                <h1>fashion mega sale</h1>
                                <a href="/shopping" class="btn btn-primary">Shop Now</a>
                                <div class="slide-border-bottom">
                                    <img src="/demo/assets/images/slider/border-bottom.png" alt="Border" width="290" height="111">
                                </div><!-- End .slide-border-bottom -->
                            </div><!-- End .home-slide-content -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->

                    <div class="home-slide">
                        <div class="slide-bg owl-lazy"  data-src="/demo/assets/images/slider/slide-2.jpg"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-8 col-md-6 text-center slide-content-right">
                                    <div class="home-slide-content">
                                        <h3>up to 70% off</h3>
                                        <h1>Women's Hats</h1>
                                        <a href="/shopping" class="btn btn-primary">Shop Now</a>
                                    </div><!-- End .home-slide-content -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->
			</div><!-- End .home-slider-container -->
			<br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <nav class="toolbox">

                        </nav>

                        <div class="row row-sm product-ajax-grid">
							@foreach ($products as $item)
                            <div class="col-6 col-md-4">
                                <div class="product-default">
                                    <figure >

										<a href="/product/{{$item->id}}">
                                            <img style="" src="/storage/product_images/{{$item->firstImage}}">
                                        </a>


                                    </figure>
                                    <div class="product-details">
                                        <div class="ratings-container">

                                        </div><!-- End .product-container -->
                                        <h2 class="product-title">
										<a href="/product/{{$item->id}}">{{$item->name}}</a>
                                        </h2>
                                        <h3 class="product-title">
										<a href="">Min.Order ({{$item->minOrder}})</a>
                                        </h3>
                                        @if($item->quantity > 0)
                                            <h3 class="product-title">
										<a href=""> ({{$item->quantity}})products in stock</a>
                                        </h3>
                                        @else
                                        <h3 class="product-title">
										<a href="">Out of Stock</a>
                                        </h3>
                                        @endif

                                        <div class="price-box">
										<span class="product-price">${{$item->price}}.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
											 <form  method="post" action="{{route('savetocart')}}" >
                               					 @csrf
													<div>

													<div class="product-single-qty">
													<div class="input-group">
														<span class="input-group-btn">
																<button onclick="increment({{$item->id}})" type="button" class="quantity-right-plus btn btn-primary btn-number" data-type="plus" data-field="">
																	+
																</button>
														</span>
														<input type="number" id="quantity{{$item->id}}" name="quantity" class="" value="1"s min="1" max="100" required="">
															<span class="input-group-btn">
																<button onclick="decrement({{$item->id}})" type="button" class="quantity-left-minus btn btn-dark btn-number"  data-type="minus" data-field="">
															-
																</button>
															</span>
													</div>
                        							</div>
														{{-- <input name="quantity" type="number" value="1" min="1" max="100"> --}}
														<input type="hidden" value="{{$item->price}}" name="price" >
														<input type="hidden" value="{{$item->id}}" name="product_id">
													</div><br>

                            						<div class="emply-btns">

                                					<button type="submit" class="btn-icon btn-add-cart"><i class="icon-bag"></i>ADD TO CART</button>
                            						</div>

                            						</form>

                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
							</div>
							@endforeach

                        </div>



                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Showing 1–9 of {{$products->count()}} results</label>
                            </div><!-- End .toolbox-item -->

                            <ul class="pagination">
                               {{ $products->onEachSide(5)->links() }}
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->

                    <aside class="sidebar-shop col-lg-3 order-lg-first">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-1">
                                    <div class="widget-body">
                                        <ul class="cat-list">
											@foreach ($categoryese as $item)
										<li><a href="/categories/{{$item->id}}">{{$item->name}}</a></li>
											@endforeach


                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->




                            <div class="widget widget-block">
                                <h3 class="widget-title">Get More From Delvier</h3>
                                <h5>Buy & Get Your products Delivered.</h5>

                            </div><!-- End .widget -->
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

    	<section>
	</section>
   <div class="carousel-section">
       <div class="container">
           <h2 class="h3 title mb-4 text-center">New Arrivals</h2>

           <div class="new-products owl-carousel owl-theme">
               @foreach($newArrivals as $item)
               <div class="product-default">
                   <figure>
                       <a href="/product/{{$item->id}}">
                           <img src="/storage/product_images/{{$item->firstImage}}" alt="product">
                       </a>
                   </figure>
                   <div class="product-details">
                       <div class="ratings-container">
                           <div class="product-ratings">
                               <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                               <span class="tooltiptext tooltip-top"></span>
                           </div><!-- End .product-ratings -->
                       </div><!-- End .product-container -->
                       <h2 class="product-title">
                           <a href="/product/{{$item->id}}">{{$item->name}}</a>
                       </h2>
                   </div><!-- End .product-details -->
               </div>
                @endforeach
           </div><!-- End .news-proucts -->
       </div><!-- End .container -->
   </div><!-- End .carousel-section -->
@endsection
