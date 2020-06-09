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
                    <div class="col-lg-12">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
										<th class="qty-col">Qty</th>
                                        <th class="">Action</th>
                                        <th class="">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
									  @isset($cart_items)
										@forelse ($cart_items as $items)
											<tr class="product-row">
                                        <td class="product-col">
                                            <figure class="product-image-container">
                                                <a href="/product/{{$items->product['id']}}" class="product-image">
                                                    <img src="/storage/product_images/{{$items->product['firstImage']}}" alt="product">
                                                </a>
                                            </figure>
                                            <h2 class="product-title">
                                                <a href="/product/{{$items->product['id']}}">{{$items->product['name']}}</a>
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
                                        <td>
                                            <form action="/selectcheckout" method="get">
											@csrf
                                            <input class="form-control" type="hidden" value="{{$items->id}}" name="cart_item_id">
                                            <input class="form-control" type="hidden" value="{{$items->product['shop_id']}}" name="shop_id">
											<button class="btn btn-sm btn-primary"  title="checkout" value="delete" >CheckOut with this supplier</button>
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
                                                <a href="/shopping" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->

                                            <div class="float-right">

                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div><!-- End .cart-table-container -->


                    </div><!-- End .col-lg-8 -->


                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-12"></div><!-- margin -->


@endsection
