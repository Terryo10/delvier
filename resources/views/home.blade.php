@extends('layouts.final')
@section('content')
       <div class="features-section">
                <div class="container">
                    <h2 class="subtitle">My Orders</h2>
                    <div class="row">
						@if ($orders->count() > 0)									      
						@foreach ($orders as $item)
                        <div class="col-lg-4">
                            <div class="feature-box">
                                <i class="icon-cart"></i>

                                <div class="feature-box-content">
                                    <h3>ORDER REF: {{$item->id}}</h3>
									<p>
									 CREATED ON: {{$item->created_at}}<br>
									 PAYMENT STATUS: {{$item->paymentStatus}}<br>
									 TRANSACTION REF: {{$item->transaction_ref}}
									</p>
								</div><!-- End .feature-box-content -->
								<a href="/single_order/{{$item->id}}" class="btn btn-block btn-sm btn-primary">View Order</a>
							</div><!-- End .feature-box -->
							  
						</div><!-- End .col-lg-4 -->
						@endforeach
						@else
						    <div class="col-lg-12">
                            <div class="feature-box">
                                <i class="icon-cart"></i>

                                <div class="feature-box-content">
                                <h3>YOU DONT HAVE ORDERS YET</h3>
                                   

                                </div><!-- End .feature-box-content -->
                                <br>
                                <div class="checkout-methods">
                                <a href="/shopping" class="btn btn-block btn-sm btn-primary">START SHOPPING</a>
                            </div><!-- End .checkout-methods -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->
					</div><!-- End .row -->
					
					
				</div><!-- End .container -->
				@endif
            </div><!-- End .features-section -->



@endsection
