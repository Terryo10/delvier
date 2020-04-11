@extends('layouts.front2')
@section('content')

	<section>
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-12 column">
				 		<div class="job-single-sec style3">
				 			<div class="job-head-wide">
				 				<div class="row">
				 				
				 				
				 				</div>
				 			</div>
				 			<div class="job-wide-devider">
							 	<div class="row">
							 		<div class="col-lg-8 column">		
							 		
								 		<div class="recent-jobs">
							 				<h3>{{auth()->user()->name}}'s Shopping Cart</h3>
							 				<div class="job-list-modern">
                                                  @isset($cart_items)
                                                      @forelse ($cart_items as $items)
											 	<div class="emply-resume-list">
                                                    <div class="emply-resume-thumb">
                                                        <img src="/storage/product_images/{{$items->product['firstImage']}}" alt="" />
                                                    </div>
                                                    <div class="emply-resume-info">
                                                        <h3><a href="#" title="">{{$items->product['name']}}</a></h3>
                                                        <span><i>Single item Price</i> $ {{$items->product['price']}}.00</span>
																		
																<div class="pagination">
																	<ul>
																		<li class="prev"><a href="#"><i class="la la-long-arrow-left"></i> Decrement</a></li>
																		<li><a href="#">Items x {{$items->quantity}}</a></li>
																		<li class="next"><a href="#">Increment <i class="la la-long-arrow-right"></i></a></li>
																	</ul>
																</div>
													</div>
													
                                                    <div class="shortlists">
														<form class="resumeadd-form" action="/cart/delete" method="get">
															@csrf
															<input class="form-control" type="hidden" value="{{$items->id}}" name="cart_item_id">
															<button class="theme-btn reply-btn" value="delete " type="submit">Remove Product</button>
														</form>
																	</div>
                                                </div><!-- Emply List -->
                                                @empty
													<div class="emply-resume-list">
                                                    <div class="emply-resume-thumb">
                                                        <img src="" alt="" />
                                                    </div>
                                                    <div class="emply-resume-info">
                                                        <h3><a href="/" title="">Your Cart Is Empty Click here to Continue Shopping</a></h3>
                                                        
													</div>
													
                                                   
                                                </div><!-- Emply List -->

                                                 @endforelse
                                                @endisset 
											 </div>
							 			</div>
							 		</div>
							 		<div class="col-lg-4 column">
							 			<!-- Job Overview -->
								 		<div class="quick-form-job">
                                             <h3>Select Payment Method</h3>
                                             
								 			
                                         </div>
                                         <div class="quick-form-job">
                                             <h3>Total Price:$ {{$total}}.00</h3>
                                             
								 			
										 </div>
										 @isset($cart_items)
										 @if($cart_items->count()>0)
											 <div class="emply-btns">
								 			<a class="followus" href="/brain" title=""><i class="la la-shopping-cart"></i>CHECKOUT</a>
								 		</div>
										 @else
											 
										 @endif
										 @endisset
								 		
								 			
								 		</div>
							 		</div>
							 	</div>
							 </div>
					 	</div>
				 	</div>
				</div>
			</div>
		</div>
	</section>
@endsection