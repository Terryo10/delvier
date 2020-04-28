@extends('layouts.front2')
@section('content')
	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Featured Categories</h2>
							<span>Filter Products With The Category Of Your Choice</span>
						</div><!-- Heading -->
						<div class="job-listings-sec">
                            @foreach ($category as $item)
                                <div class="job-listing">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="" alt="" /> </div>
                                <h3><a href="#" title="">{{$item->name}}</a></h3>
									
								</div>
								<span class="job-lctn"><i class="la la-shopping-cart"></i>Category</span>
								
                            <span class="job-is ft" ><a href="/category/{{$item->id}}">({{$item->products->count()}}) Products</a></span>
							</div><!-- Job -->
                            @endforeach
							
						
						</div>
					</div>
					<div class="col-lg-12">
						<div class="browse-all-cat">
							<a href="#" title="">Load more listings</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection