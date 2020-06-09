@extends('layouts.final')
@section('content')

 <nav aria-label="breadcrumb" class="top-nav breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb mt-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="category.html">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
 <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row row-sm">
                            @foreach ($products as $item)
                             <div class="col-6 col-md-4">
                                <div class="product-default">
                                    <figure >
										
										<a href="/product/{{$item->id}}">
                                            <img style="" src="/storage/product_images/{{$item->firstImage}}">
                                        </a>
										
                                        
                                    </figure>
                                    <div class="product-details">
                                        
                                        <h2 class="product-title">
										<a href="/product/{{$item->id}}">{{$item->name}}</a>
                                        </h2>
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
																<button onclick="increment({{$item->id}})" type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
																	+
																</button>
															</span>
														<input type="number" id="quantity{{$item->id}}" name="quantity" class="" value="1"s min="1" max="100" required="">
															<span class="input-group-btn">
																<button onclick="decrement({{$item->id}})" type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
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
                                <label>Showing 1–9 of 60 results</label>
                            </div><!-- End .toolbox-item -->

                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><span>...</span></li>
                                <li class="page-item"><a class="page-link" href="#">15</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->

                    <aside class="sidebar-shop col-lg-3 order-lg-first">
                         <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">More Categories</a>
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
@endsection