@extends('layouts.front2')

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
												<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
											</div>
											<div class="job-style-bx">
											<span class="job-is ft">{{$item->paymentStatus}}</span>
												<span class="fav-job"><i class="la la-heart-o"></i></span>
												<i>5 months ago</i>
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
				 	<div class="col-lg-4 column">
                         <a class="apply-thisjob" href="/profile" title=""><i class="la la-paper-plane"></i>My Profile</a>

                         <div class="apply-alternative">
				 			<a href="delivery/create" title=""><i class="fa fa-bus"></i>My Delivery settings</a>
				 			<span><i class="la la-heart-o"></i> Shortlist</span>
				 		</div>
				 		<div class="job-overview">
				 			<h3>Delvier International</h3>
				 			<ul>
				 				<li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
				 				<li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
				 				<li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
				 				<li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
				 				<li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
				 				<li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
				 			</ul>
				 		</div><!-- Job Overview -->
	
				 	</div>
				</div>
			</div>
		</div>
	</section>
@endsection
