@extends('layouts.final')
@section('content')
    <div class="features-section">
        <div class="container">
            <h2 class="subtitle">Select Checkout</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div class="feature-box">
                        <i class="icon-shipped"></i>

                        <div class="feature-box-content">
                            <div class="checkout-methods">
                                <a href="/placeorder?cart_item_id={{$cart_item_id}}&shop_id={{$shop_id}}" class="btn btn-block btn-sm btn-primary">Place Order & communicate with supplier for the shipping price</a>
                                <a href="/checkout/supplier?cart_item_id={{$cart_item_id}}&shop_id={{$shop_id}}"class="btn btn-block btn-sm btn-dark">Use Automated Shipping Rates</a>
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .feature-box-content -->
                    </div><!-- End .feature-box -->
                </div><!-- End .col-lg-4 -->



            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .features-section -->
@endsection
