@extends('layouts.front2')
@section('content')
    	<section>
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column border-right">
				 		<div class="widget">
				 			<div class="tree_widget-sec">
				 				<ul>
				 					<li><a href="candidates_profile.html" title=""><i class="la la-file-text"></i>My Profile</a></li>
									<li><a href="candidates_my_resume.html" title=""><i class="la la-briefcase"></i>My Resume</a></li>
									<li><a href="candidates_shortlist.html" title=""><i class="la la-money"></i>Shorlisted Job</a></li>
									<li><a href="candidates_applied_jobs.html" title=""><i class="la la-paper-plane"></i>Applied Job</a></li>
									<li><a href="candidates_job_alert.html" title=""><i class="la la-user"></i>Job Alerts</a></li>
									<li><a href="candidates_cv_cover_letter.html" title=""><i class="la la-file-text"></i>Cv & Cover Letter</a></li>
									<li><a href="candidates_change_password.html" title=""><i class="la la-flash"></i>Change Password</a></li>
									<li><a href="#" title=""><i class="la la-unlink"></i>Logout</a></li>
				 				</ul>
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<div class="skill-perc">
				 				<h3>Skills Percentage </h3>
				 				<p>Put value for "Cover Image" field to increase your skill up to "15%"</p>
				 				<div class="skills-bar">
				 					<span>85%</span>
				 					<div 
				 						class="second circle" 
				 						data-size="155"
				 						data-thickness="60">
								    </div>
				 				</div>
				 			</div>
				 		</div>
				 	</aside>
				 	<div class="col-lg-9 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<div class="border-title"><h3>Fill in the following details to checkout</h3></div>
						 		
						 	
								 <form action="{{route('pay.paypal')}}">
									@csrf
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				
					 					<div class="col-lg-6">
					 						<span class="pf-title">Telephone*</span>
					 						<div class="pf-field">
					 							<input placeholder="" name="phone" type="phone" required="">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Delivery Address*</span>
					 						<div class="pf-field">
					 							<input type="address" name="address" required="">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="submit">Procced To Checkout With PayPal</button>
					 					</div>
						 			</div>
								 </div>
						 		</form>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection