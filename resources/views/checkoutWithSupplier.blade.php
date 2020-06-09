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
                                    <h3>Select Shipping Method</h3>
                                    <div class="alert alert-success">
                                        <ul>
                                            @foreach($shipment->messages as $item)
                                            <li>{{$item}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <form action="/proceedtotransaction" method="get">
                                        <select name="rate"class="browser-default custom-select custom-select-lg mb-3" required="">
                                            <option selected value="">Open this select menu</option>
                                            @foreach ($shipment->rates as $item)


                                        <option value="{{$loop->index}}">{{$item->carrier}}||{{$item->service}}|| for ${{$item->retail_rate}} {{$item->retail_currency}}||Delivery Days{{$item->delivery_days}}</option>
                                            @endforeach
                                        </select>
                                        @if($shipment->rates ==! null)
                                            <input type="hidden" name="shop_id" value="{{$getShop->id}}">
                                            <input type="hidden" name="cart_item_id" value="{{$cart_item->id}}">
                                        <button class="btn btn-block btn-sm btn-success"  title="checkout" type="submit" >Proceed to checkout</button>

                                        @else
                                            <a href="#"class="btn btn-block btn-sm btn-danger">Sorry No delivery option :(</a>
                                        @endif
                                    </form>

                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .features-section -->
@endsection
