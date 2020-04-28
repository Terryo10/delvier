@extends('layouts.final')
@section('content')
       
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">{{auth::user()->name}}'s Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
										<th class="qty-col">Qty</th>
										<th class="">Action</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    
									  @isset($cart_items)
										@forelse ($cart_items as $items)
											<tr class="product-row">
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="/storage/product_images/{{$items->product['firstImage']}}" alt="product">
                                                </a>
                                            </figure>
                                            <h2 class="product-title">
                                                <a href="product.html">{{$items->product['name']}}</a>
                                            </h2>
                                        </td>
                                        <td>$ {{$items->product['price']}}</td>
                                        <td>
                                            Items x {{$items->quantity}}
										</td>
										<td>
											<form action="/cart/delete" method="get">
											@csrf
											<input class="form-control" type="hidden" value="{{$items->id}}" name="cart_item_id">
											<button class="btn btn-sm btn-primary"  title="Remove product" value="delete " >Remove Product</button>
											</form>
										</td>
									</tr>
									       <tr class="product-action-row">
                                        <td colspan="4" class="clearfix">
                                           
                                            
                                            <div class="float-right">
													
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tbody>
                               
											 	
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
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="/shop" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->

                                            <div class="float-right">
                                                
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                             
                            </table>
                        </div><!-- End .cart-table-container -->

                       
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Summary</h3>

                            <h4>
                                <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax</a>
                            </h4>

                            <div class="collapse" id="total-estimate-section">
                                <form action="#">
                                    <div class="form-group form-group-sm">
                                        <label>Country</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="USA">United States</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="China">China</option>
                                                <option value="Germany">Germany</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <label>State/Province</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="CA">California</option>
                                                <option value="TX">Texas</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-sm">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-custom-control">
                                        <label>Flat Way</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="flat-rate">
                                            <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-custom-control">
                                        <label>Best Rate</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="best-rate">
                                            <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->
                                </form>
                            </div><!-- End #total-estimate-section -->

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>${{$total}}.00</td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>${{$total}}.00</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a href="/brain" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                                <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        

@endsection