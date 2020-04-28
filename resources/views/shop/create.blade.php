@extends('layouts.front2')
@section('content')
	<section>
		<div class="block no-padding  gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner2">
							<div class="inner-title2">
								<h3>How It Works</h3>
								<span>Get a digital tour of how Jobhunt works for you.</span>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="/home" title="">Home</a></li>
									<li><a href="#" title="">Apply Shop</a></li>
								
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="block">
			<div class="container">
				 <div class="row">
				 	<div class="col-lg-6 column">
				 		<div class="contact-form">
				 			<h3>Apply For A Shop</h3>
						 <form action="{{route('shop.store')}}" method="POST"  enctype="multipart/form-data">
							@csrf
				 				<div class="row">
				 					<div class="col-lg-12">
				 						<span class="pf-title">Shop Name</span>
				 						<div class="pf-field">
				 							<input name="name" type="text" placeholder="" required=""/>
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<span class="pf-title">Shop Physical Address</span>
				 						<div class="pf-field">
				 							<input type="text" name="address" placeholder="Address" required=""/>
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<span class="pf-title">Phone</span>
				 						<div class="pf-field">
				 							<input name="phone" type="text" placeholder="tel" required="" />
				 						</div>
									 </div>
									 <div class="col-lg-12">
										 <span class="pf-title">WhatsApp Phone number</span>
										 <span class="pf-title">Use : 15551234567	</span>
										 <span>Don't use: +001-(555)1234567</span>
				 						<div class="pf-field">
				 							<input name="whatsappPhone" type="text" placeholder="tel" required="" />
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<span class="pf-title">Shop Description</span>
				 						<div class="pf-field">
				 							<textarea name="description"></textarea>
				 						</div>
                                     </div>
                                     <div class="col-lg-12">
				 						<span class="pf-title">Upload Shop Logo : only jpg /jpeg format</span>
				 						<div class="pf-field">
				 							<input type="file" class="form-control" name="image" id="" >
				 						</div>
				 					</div>
				 					<div class="col-lg-12">
				 						<button type="submit">Send</button>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 	</div>
				 	<div class="col-lg-6 column">
					 	<div class="contact-textinfo">
					 		<h3>DelvierInternational Office</h3>
					 		<ul>
					 			<li><i class="la la-map-marker"></i><span>Jobify Inc. 555 Madison Avenue, Suite F-2 Manhattan, New York 10282 </span></li>
					 			<li><i class="la la-phone"></i><span>Call Us : 0934 343 343</span></li>
					 			<li><i class="la la-fax"></i><span>Fax : 0934 343 343</span></li>
					 			<li><i class="la la-envelope-o"></i><span>Email : <a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d1b8bfb7be91bbbeb3b9a4bfa5ffb2bebc">[email&#160;protected]</a></span></li>
					 		</ul>
					 		<a class="fill" href="#" title="">See on Map</a><a href="#" title="">Directions</a>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
    
@endsection