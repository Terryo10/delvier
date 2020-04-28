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
                                            <div class="product-item">
                                                <img class="product-single-image" src="assets/images/products/zoom/product-2.jpg" data-zoom-image="assets/images/products/zoom/product-2-big.jpg"/>
                                            </div>
                                            <div class="product-item">
                                                <img class="product-single-image" src="assets/images/products/zoom/product-3.jpg" data-zoom-image="assets/images/products/zoom/product-3-big.jpg"/>
                                            </div>
                                            <div class="product-item">
                                                <img class="product-single-image" src="assets/images/products/zoom/product-4.jpg" data-zoom-image="assets/images/products/zoom/product-4-big.jpg"/>
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
                                        <div class="col-3 owl-dot">
                                            <img src="assets/images/products/zoom/product-2.jpg"/>
                                        </div>
                                        <div class="col-3 owl-dot">
                                            <img src="assets/images/products/zoom/product-3.jpg"/>
                                        </div>
                                        <div class="col-3 owl-dot">
                                            <img src="assets/images/products/zoom/product-4.jpg"/>
                                        </div>
                                    </div>
                                </div><!-- End .col-lg-7 -->

                                <div class="col-lg-5 col-md-6">
                                    <div class="product-single-details">
									<h1 class="product-title">{{$product->name}}</h1>

            ><!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">$81.00</span>
										<span class="product-price">${{$product->price}}</span>
                                        </div><!-- End .price-box -->

                                        <div class="product-desc">
										<p>{{$product->description}}</p>
                                        </div><!-- End .product-desc -->

                                        <div class="product-filters-container">
                                            <div class="product-single-filter">
                                                <label>Colors:</label>
                                                <ul class="config-swatch-list">
                                                    <li class="active">
                                                        <a href="#" style="background-color: #6085a5;"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="background-color: #ab6e6e;"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="background-color: #b19970;"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="background-color: #11426b;"></a>
                                                    </li>
                                                </ul>
                                            </div><!-- End .product-single-filter -->
                                        </div><!-- End .product-filters-container -->

                                        <div class="sticky-header">
                                            <div class="container">
                                                <div class="sticky-img">
                                                    <img src="assets/images/products/zoom/product-1.jpg" />
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
            
													<a href="#" class="rating-link"> ( {{$product->quantity}}In stock ) </a>
                                                    </div><!-- End .product-container -->
                                                </div><!-- End .sticky-detail -->
                                                <a  href="https://api.whatsapp.com/send?phone={{$product->whatsappPhone}}&text=Inquiring on product {{$product->name}}" class="paction add-cart" title="Add to Cart">
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

                                        <div class="product-single-share">
                                            <label>Share:</label>
                                            <!-- www.addthis.com share plugin-->
                                            <div class="addthis_inline_share_toolbox"></div>
                                        </div><!-- End .product single-share -->
                                    </div><!-- End .product-single-details -->
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-single-container -->

                        <div class="product-single-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Tags</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                    <div class="product-desc-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                        <ul>
                                            <li><i class="icon-ok"></i>Any Product types that You want - Simple, Configurable</li>
                                            <li><i class="icon-ok"></i>Downloadable/Digital Products, Virtual Products</li>
                                            <li><i class="icon-ok"></i>Inventory Management with Backordered items</li>
                                        </ul>
                                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                    </div><!-- End .product-desc-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                                    <div class="product-tags-content">
                                        <form action="#">
                                            <h4>Add Your Tags:</h4>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm" required>
                                                <input type="submit" class="btn btn-primary" value="Add Tags">
                                            </div><!-- End .form-group -->
                                        </form>
                                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                    </div><!-- End .product-tags-content -->
                                </div><!-- End .tab-pane -->

                                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                    <div class="product-reviews-content">
                                        <div class="collateral-box">
                                            <ul>
                                                <li>Be the first to review this product</li>
                                            </ul>
                                        </div><!-- End .collateral-box -->

                                        <div class="add-product-review">
                                            <h3 class="text-uppercase heading-text-color font-weight-semibold">WRITE YOUR OWN REVIEW</h3>
                                            <p>How do you rate this product? *</p>

                                            <form action="#">
                                                <table class="ratings-table">
                                                    <thead>
                                                        <tr>
                                                            <th>&nbsp;</th>
                                                            <th>1 star</th>
                                                            <th>2 stars</th>
                                                            <th>3 stars</th>
                                                            <th>4 stars</th>
                                                            <th>5 stars</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Quality</td>
                                                            <td>
                                                                <input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Value</td>
                                                            <td>
                                                                <input type="radio" name="value[1]" id="Value_1" value="1" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="value[1]" id="Value_2" value="2" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="value[1]" id="Value_3" value="3" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="value[1]" id="Value_4" value="4" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="value[1]" id="Value_5" value="5" class="radio">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Price</td>
                                                            <td>
                                                                <input type="radio" name="price[1]" id="Price_1" value="1" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="price[1]" id="Price_2" value="2" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="price[1]" id="Price_3" value="3" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="price[1]" id="Price_4" value="4" class="radio">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="price[1]" id="Price_5" value="5" class="radio">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <div class="form-group">
                                                    <label>Nickname <span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div><!-- End .form-group -->
                                                <div class="form-group">
                                                    <label>Summary of Your Review <span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div><!-- End .form-group -->
                                                <div class="form-group mb-2">
                                                    <label>Review <span class="required">*</span></label>
                                                    <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                                </div><!-- End .form-group -->

                                                <input type="submit" class="btn btn-primary" value="Submit Review">
                                            </form>
                                        </div><!-- End .add-product-review -->
                                    </div><!-- End .product-reviews-content -->
                                </div><!-- End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-single-tabs -->
                    </div><!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle"><i class="icon-sliders"></i></div>
                    <aside class="sidebar-product col-lg-3 padding-left-lg mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget widget-brand">
                                <a href="#">
                                    <img src="assets/images/product-brand.png" alt="brand name">
                                </a>
                            </div><!-- End .widget -->

                            <div class="widget widget-info">
                                <ul>
                                    <li>
                                        <i class="icon-shipping"></i>
                                        <h4>FREE<br>SHIPPING</h4>
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

                            <div class="widget widget-banner">
                                <div class="banner banner-image">
                                    <a href="#">
                                        <img src="assets/images/banners/banner-sidebar.jpg" alt="Banner Desc">
                                    </a>
                                </div><!-- End .banner -->
                            </div><!-- End .widget -->

                            <div class="widget widget-featured">
                                <h3 class="widget-title">Featured Products</h3>
                                
                                <div class="widget-body">
                                    <div class="owl-carousel widget-featured-products">
                                        <div class="featured-col">
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-7.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h2>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div><div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-8.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h2>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div><div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-9.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h2>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div><!-- End .featured-col -->

                                        <div class="featured-col">
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-10.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h2>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div><div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-11.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h2>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div><div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="product.html">
                                                        <img src="assets/images/products/product-12.jpg">
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h2 class="product-title">
                                                        <a href="product.html">Product Short Name</a>
                                                    </h2>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div><!-- End .featured-col -->
                                    </div><!-- End .widget-featured-slider -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .widget -->
                        </div>
                    </aside><!-- End .col-md-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="featured-products-section carousel-section">
                <div class="container">
                    <h2 class="h3 title mb-2">Featured Products</h2>

                    <div class="featured-products owl-carousel owl-theme">
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-10-white.jpg" alt="product">
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
                                    <a href="product.html">Product Short Name</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-3-white.jpg" alt="product">
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
                                    <a href="product.html">Product Short Name</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-13-white.jpg" alt="product">
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
                                    <a href="product.html">Product Short Name</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-2-white.jpg" alt="product">
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
                                    <a href="product.html">Product Short Name</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-8-white.jpg" alt="product">
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
                                    <a href="product.html">Product Short Name</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="assets/images/products/product-1-white.jpg" alt="product">
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
                                    <a href="product.html">Product Short Name</a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">$9.00</span>
                                </div><!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-bag"></i>ADD TO CART</button>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> 
                                </div>
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .featured-proucts -->
                </div><!-- End .container -->
            </div><!-- End .featured-proucts-section -->
        
	<section>
		<div class="block">
			<div class="container">
				 <div class="row">
				 	<div class="col-lg-9 column">
				 		<div class="bloglist-sec">
				 			<div class="blogpost style2">
                             <div class="blog-posthumb"> <a href="#" title=""><img src="/storage/product_images/{{$product->firstImage}}" alt="" /></a> </div>
				 				<div class="blog-postdetail">
                                 <ul class="post-metas"><li><a title=""><i class="la la-bag"></i>({{$product->quantity}}) Products In Stock</a></li>
                               </ul>
                                 <h3><a href="#" title="">{{$product->name}}</a></h3>
                                 <p>{{$product->description}}</p>
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

                            <div class="emply-btns">
                                
                                <button type="submit" class=""><strong>ADD TO CART</strong> <i class="la la-shopping-cart"></i></button>
                            </div>

                </form>
				 					
				 				</div>
				 			</div><!-- Blog Post -->
				 			
				 			
				 
				 		</div>
					</div>
					<aside class="col-lg-3 column">
							<div class="search_widget_job">
								  <form class="uk-search uk-search-default uk-width-1-1" action="{{route('search')}}" method="GET" >
				 				<div class="field_w_search">
				 					<input name="query" value="{{ request()->input('query')}}" type="text" placeholder="Search Product" />
				 					<i class="la la-search"></i>
								 </div><!-- Search Widget -->
								  </form>
				 			
				 			</div>
				 	
				 		<div class="widget">
				 			<h3>Actions</h3>

							 	 <div class="emply-btns">
								  <a class="followus" href="https://api.whatsapp.com/send?phone={{$product->whatsappPhone}}&text=Inquiring on product {{$product->name}}" title=""><i class="la la-envelope"></i>Chat with Product Supplier</a>
								 		</div>
				 		</div>
				 	
				 	
					</aside>
				 </div>
			</div>
		</div>
	</section>
    
@endsection