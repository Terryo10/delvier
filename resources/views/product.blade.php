@extends('layouts.final')
@section('content')

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                        
					<li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-single-container product-single-default">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 product-single-gallery">
                                    <div class="product-slider-container product-item">
                                        <div class="product-single-carousel owl-carousel owl-theme">
                                            <div class="product-item">
                                                <img class="product-single-image" src="/storage/product_images/{{$product->firstImage}}" data-zoom-image="/storage/product_images/{{$product->firstImage}}"/>
                                            </div>
                                            
                                        </div>
                                        <!-- End .product-single-carousel -->
                                        <span class="prod-full-screen">
                                            <i class="icon-plus"></i>
                                        </span>
                                    </div>
                                    <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                                        <div class="col-3 owl-dot">
                                            <img src="/storage/product_images/{{$product->firstImage}}"/>
                                        </div>
                                      
                                    </div>
                                </div><!-- End .col-lg-7 -->

                                <div class="col-lg-5 col-md-6">
                                    <div class="product-single-details">
									<h1 class="product-title">{{$product->name}}</h1>

            <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">${{$product->price}}</span>
										<span class="product-price">${{$product->price}}</span>
                                        </div><!-- End .price-box -->

                                        <div class="product-desc">
										<p>{{$product->description}}</p>
                                        </div><!-- End .product-desc -->

                                       

                                        <div class="sticky-header">
                                            <div class="container">
                                                <div class="sticky-img">
                                                    <img src="/storage/product_images/{{$product->firstImage}}"/>
                                                </div>
                                                <div class="sticky-detail">
                                                    <div class="sticky-product-name">
													<h2 class="product-title">{{$product->name}}</h2>
                                                        <div class="price-box">
                                                            <span class="old-price"></span>
														<span class="product-price">${{$product->price}}</span>
                                                        </div><!-- End .price-box -->
                                                    </div>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                        </div><!-- End .product-ratings -->
            
													<a href="#" class="rating-link"> ( {{$product->quantity}} In stock ) </a>
                                                    </div><!-- End .product-container -->
                                                </div><!-- End .sticky-detail -->
                                                <a  href="https://api.whatsapp.com/send?phone={{$product->whatsappPhone}}&text=Inquiring on product {{$product->name}}" class="paction add-cart" title="Contact">
                                                    <span>Contact Supplier On WhatsApp</span>
												</a>
			
                                            </div><!-- end .container -->
                                        </div><!-- end .sticky-header -->

                                        <div class="product-action product-all-icons">
											 <form method="post" action="{{route('savetocart')}}" >
														@csrf
													<div>
														Quantity:
													<div class="">
													<div class="input-group">
															<span class="input-group-btn">
																<button onclick="decrement({{$product->id}})" type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
															-
																</button>
															</span>
														<input type="number" id="quantity{{$product->id}}" name="quantity" class="form-control input-number" value="1"s min="1" max="100" required="">
															<span class="input-group-btn">
																<button onclick="increment({{$product->id}})" type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
																	+
																</button>
															</span>
													</div>
												</div>
														{{-- <input name="quantity" type="number" value="1" min="1" max="100"> --}}
														<input type="hidden" value="{{$product->price}}" name="price" >
														<input type="hidden" value="{{$product->id}}" name="product_id">
													</div><br>

													<div class="product-action">
														
														<button type="submit" class="paction add-cart">ADD TO CART</button>
													</div>

										</form>
                                        </div><!-- End .product-action -->

                                      
                                    </div><!-- End .product-single-details -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-single-container -->

                    
                    </div><!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                    <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                        <div class="sidebar-wrapper">
                     

                            <div class="widget widget-info">
                                <ul>
                                    <li>
                                        <i class="icon-shipping"></i>
                                       <h4>  ( {{$product->quantity}} In stock )</h4>
                                    </li>
                                    <li>
                                        <i class="icon-shipping"></i>
                                       <h4>  ( {{$product->minOrder}} MOQ )</h4>
                                    </li>
                                    <li>
                                        <i class="icon-us-dollar"></i>
                                        <h4>100% MONEY<br>BACK GUARANTEE</h4>
                                    </li>
                                    <li>
                                        <i class="icon-online-support"></i>
                                        <h4>ONLINE<br>SUPPORT 24/7</h4>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->

                          

                            
                        </div>
                    </aside><!-- End .col-md-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            


    
@endsection