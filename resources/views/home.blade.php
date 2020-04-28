@extends('layouts.final')
@section('content')
	<section>
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-8 column">
				 		<div class="job-single-sec">
				 		
				 			
				 			<div class="share-bar">
				 				<span>My Orders</span>
				 			</div>
				 			<div class="recent-jobs">
				 				<h3>Recent Orders</h3>
				 				<div class="job-list-modern">
									 @if ($orders->count() > 0)
										 @foreach ($orders as $item)
										 <div class="job-listings-sec no-border">
										<div class="job-listing wtabs">
											<div class="job-title-sec">
												<div class="c-logo"> <img src="images/resource/l1.png" alt="" /> </div>
											<h3><a href="#" title="">Order Refrence :{{$item->id}}</a></h3>
											<span>Created at {{$item->created_at}}</span>
											
											</div>
											<div class="job-style-bx">
											<span class="job-is ft">ORDER STATUS: {{$item->paymentStatus}}</span>
												<span class="fav-job"><i class="la la-heart-o"></i></span>
												
											</div>
										</div>
									</div>
									 @endforeach
									 @else
										 <div class="job-listings-sec no-border">
										<div class="job-listing wtabs">
											<div class="job-title-sec">
											<div class="c-logo"> <img src="images/resource/l1.png" alt="" /> </div>
											<h3><a href="/" title="">You Have No Orders YET!! Click here To start shopping</a></h3>
											
											<span></span>
												
											</div>
											
										</div>
									</div>
									 @endif
									
								 	
								 </div>
				 			</div>
				 		</div>
				 	</div>
				 	
				</div>
			</div>
		</div>
	</section>
@endsection
