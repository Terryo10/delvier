@extends('layouts.final')
@section('content')
    <div class="features-section">
        <div class="container">
            <h2 class="subtitle">CheckOut with {{$getShop->company}}</h2>
            <div class="checkout-methods">
                <a href="https://api.whatsapp.com/send?phone={{$cart_item->product['whatsappPhone']}}&text=Inquiring on product {{$cart_item->product['name']}}" class="btn btn-block btn-sm btn-primary">Chat with supplier: {{$getShop->company}} on whatsapp</a>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-box">
                        <i class="icon-shipped"></i>

                        <div class="feature-box-content">
                            @if($temporaryAddress == !null)
                                <h3>Address: {{$temporaryAddress->street1}}</h3>
                                <p>Country: {{$temporaryAddress->country}}
                                    <br>City: {{$temporaryAddress->city}}
                                    <br>Phone: {{$temporaryAddress->phone}}
                                    <br>Firstname: {{$temporaryAddress->firstname}}
                                    <br>Lastname: {{$temporaryAddress->lastname}}

                                </p>

                        </div><!-- End .feature-box-content -->
                        <br>
                        <div class="checkout-methods">

                            <a href="/shipping_change/{{$temporaryAddress->id}}" class="btn btn-block btn-sm btn-danger">Use A different address</a>

                            @else
                                <a href="#" class="btn btn-block btn-sm btn-primary">You Dont have a shipping address</a>
                                <a href="/shipping_details"class="btn btn-block btn-sm btn-danger">Click Here To Add Address</a>

                            @endif
                        </div><!-- End .checkout-methods -->
                    </div><!-- End .feature-box-content -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box">
                        <i class="icon-us-dollar"></i>

                        <div class="feature-box-content">
                            <h3>Product</h3>
                            <p>Name: {{$cart_item->product['name']}}
                                <br>Quantity: {{$cart_item->quantity}}
                                <br>Total: $ {{$cart_item->quantity*$cart_item->price}}.00
                            </p>
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->

                <div class="col-lg-4">
                    <div class="feature-box">
                        <i class="icon-online-support"></i>

                        <div class="feature-box-content">
                            <h3>Place your order</h3>
                            <div class="alert alert-success">
                                <ul>
                                Please note that after placing your order communicate with the supplier for shippment fees
                                </ul>
                            </div>
                                    <a href="/savependingorder?cart_item_id={{$cart_item_id}}&shop_id={{$shop_id}}"class="btn btn-block btn-sm btn-success">Place Order</a>


                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .features-section -->

    @endsection
