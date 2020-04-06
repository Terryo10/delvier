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
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<span class="pf-title">Title</span>
					 						<div class="pf-field">
					 							<input placeholder="Tooms.." type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">From Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2007" type="text" class="form-control datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">To Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2012" type="text" class="form-control datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Institute</span>
					 						<div class="pf-field">
					 							<input type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="submit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Work Experience</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<span class="pf-title">Title</span>
					 						<div class="pf-field">
					 							<input placeholder="Tooms.." type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-5">
					 						<span class="pf-title">From Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2007" type="text" class="form-control datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-5">
					 						<span class="pf-title">To Date</span>
					 						<div class="pf-field">
					 							<input placeholder="06.11.2012" type="text" class="form-control datepicker">
					 						</div>
					 					</div>
					 					<div class="col-lg-2">
					 						<p class="remember-label">
												<input type="checkbox" name="cb" id="fgfg"><label for="fgfg">Present</label>
											</p>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Company</span>
					 						<div class="pf-field">
					 							<input type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="submit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Portfolio</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-12">
					 						<p>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</p>
					 					</div>
					 					<div class="col-lg-12">
					 						<div class="upload-portfolio">
					 							<div class="uploadbox">
					 								<label for="file-upload" class="custom-file-upload">
													    <i class="la la-cloud-upload"></i> <span>Upload Image</span>
													</label>
													<input id="file-upload" type="file" style="display: none;" />
					 							</div>
					 							<div class="uploadfield">
							 						<span class="pf-title">Title</span>
							 						<div class="pf-field">
							 							<input placeholder="Tooms.." type="text">
							 						</div>
							 					</div>
							 					<div class="uploadbutton">
							 						<button type="submit">Save</button>
							 					</div>
					 						</div>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Professional Skills</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row align-items-end">
						 				<div class="col-lg-7">
					 						<span class="pf-title">Skill Heading</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-3">
					 						<span class="pf-title">Percentage</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-2">
					 						 <button type="submit">Save</button>
					 					</div>
						 			</div>
						 		</div>
						 		<div class="border-title"><h3>Awards</h3><a class="cancel" href="#" title=""><i class="la la-close"></i> Cancel</a></div>
						 		<div class="resumeadd-form">
						 			<div class="row">
						 				<div class="col-lg-6">
					 						<span class="pf-title">06.11.2007</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">06.11.2012</span>
					 						<div class="pf-field">
					 							<input placeholder="" type="text">
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						<span class="pf-title">Description</span>
					 						<div class="pf-field">
					 							<textarea></textarea>
					 						</div>
					 					</div>
					 					<div class="col-lg-12">
					 						 <button type="submit">Save</button>
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