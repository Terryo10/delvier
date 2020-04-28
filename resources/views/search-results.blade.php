@extends('layouts.final')
@section('content')

<div class="container">
    <div>
<h1>Search Results</h1>
<p> {{$products->count()}}Results for {{ request()->input('query')}}</p>
    </div>

<h5>Property Overview:</h5>
<!-- Properties Overview -->
<div class="properties-overview">
<div class="">
@if ($products->count() == 0)
 <h1> no results found for {{request()->input('query')}}

@else
            <div class="row row-sm product-ajax-grid">
							@foreach ($products as $item)
                            <div class="col-6 col-md-4">
                                <div class="product-default">
                                    <figure >
										
										<a href="/product/{{$item->id}}">
                                            <img style="width:120px; height:100px;" src="storage/product_images/{{$item->firstImage}}">
                                        </a>
										
                                        
                                    </figure>
                                    <div class="product-details">
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
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
@endif
                                   
                                    
</div>
</div>
</div>
@endsection