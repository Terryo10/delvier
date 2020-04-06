@extends('layouts.frontend')
@section('content')
    	<section>
		<div class="block remove-bottom">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column">
				 		<div class="widget">
				 			<div class="search_widget_job">
				 				<div class="field_w_search">
				 					<input type="text" placeholder="Search Product" />
				 					<i class="la la-search"></i>
				 				</div><!-- Search Widget -->
				 			
				 			</div>
				 		</div>
				 		<div class="widget">
				 			<h3 class="sb-title open">Filter By Category</h3>
				 			<div class="specialism_widget">
				 				<div class="simple-checkbox">
									<p><input type="checkbox" name="smplechk" id="22"><label for="22">Last Hour</label></p>
									<p><input type="checkbox" name="smplechk" id="23"><label for="23">Last 24 hours</label></p>
									<p><input type="checkbox" name="smplechk" id="24"><label for="24">Last 7 days</label></p>
									<p><input type="checkbox" name="smplechk" id="25"><label for="25">Last 14 days</label></p>
									<p><input type="checkbox" name="smplechk" id="26"><label for="26">Last 30 days</label></p>
									<p><input type="checkbox" name="smplechk" id="27"><label for="27">All</label></p>
				 				</div>
				 			</div>
				 		</div>
				 
				 		
				 	
					 </aside>
					 
				 	<div class="col-lg-9 column">
				 		<div class="emply-resume-sec">
                             @foreach ($products as $item)
                               <div class="emply-resume-list square">
				 				<div class="emply-resume-thumb">
				 					<img src="storage/product_images/{{$item->firstImage}}" alt="" />
				 				</div>
				 				<div class="emply-resume-info">
                                 <h3><a href="#" title="">{{$item->name}}</a></h3>
                                 <span><a><i>View Product</i></a></span>
                                 <p><i class="la la-money"></i>${{$item->price}}.00</p>
				 				</div>
				 				<div class="shortlists">
									   <form method="post" action="{{route('savetocart')}}" >
                                @csrf
                            <div>
                                Quantity:
                            <div class="">
                            <div class="input-group">
                                    <span class="input-group-btn">
                                        <button onclick="decrement({{$item->id}})" type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                     -
                                        </button>
                                    </span>
                                  <input type="number" id="quantity{{$item->id}}" name="quantity" class="form-control input-number" value="1"s min="1" max="100" required="">
                                    <span class="input-group-btn">
                                        <button onclick="increment({{$item->id}})" type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            +
                                        </button>
                                    </span>
                            </div>
                        </div>
                                {{-- <input name="quantity" type="number" value="1" min="1" max="100"> --}}
                                <input type="hidden" value="{{$item->price}}" name="price" >
                                <input type="hidden" value="{{$item->id}}" name="product_id">
                            </div><br>

                            <div class="emply-btns">
                                
                                <button type="submit" class=""><strong>ADD TO CART</strong> <i class="la la-shopping-cart"></i></button>
                            </div>

                            </form>
				 					
				 				</div>
				 			</div><!-- Emply List -->  
                             @endforeach
				 			
				 		
				 			
				 			
				 			
				 			
				 		
				 		
				 	

				 			<div class="pagination">
								<ul>
									<li class="prev"><a href="#"><i class="la la-long-arrow-left"></i> Prev</a></li>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><span class="delimeter">...</span></li>
									<li><a href="#">14</a></li>
									<li class="next"><a href="#">Next <i class="la la-long-arrow-right"></i></a></li>
								</ul>
							</div><!-- Pagination -->
				 		</div>
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection