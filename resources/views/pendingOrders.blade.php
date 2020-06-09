@extends('layouts.final')
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb mt-0">
                <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Pending Orders</li>
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
                            <th class="">Supplier </th>
                            <th class="">Action</th>
                            <th class="">Shipping price</th>
                            <th class="">Action</th>


                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($pending as $items)
                                <tr class="product-row">
                                    <td class="product-col">
                                        <figure class="product-image-container">
                                            <a href="/product/{{$items->cart_items}}" class="product-image">
                                                <img src="/storage/product_images/{{$items->cart_item->product['firstImage']}}" alt="product">
                                            </a>
                                        </figure>
                                        <h2 class="product-title">
                                            <a href="/product/{{$items->product['id']}}">{{$items->cart_item->product['name']}}</a>
                                        </h2>
                                    </td>
                                    <td>$ {{$items->cart_item->product['price']}}</td>
                                    <td>
                                        Items x {{$items->cart_item['quantity']}}
                                    </td>
                                    <td>
                                        {{$items->shop['company']}}
                                    </td>
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone={{$items->cart_item->product['whatsappPhone']}}&text=Inquiring on product {{$items->cart_item->product['name']}} ">  <button class="btn btn-sm btn-primary"  title="checkout" value="delete" >chat with supppiler on whatsapp</button></a>
                                    </td>
                                    <td>
                                        $ {{$items->shipping_price}}
                                    </td>
                                    <td>
                                        @if($items->procced_to_payment == true)
                                            <a href="/checkout_options_pending?pending_id={{$items->id}}"><button class="btn btn-success">Proceed to pay</button></a>
                                        @else
                                        <button class="btn btn-success">Confiming shipping price</button>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="product-action-row">
                                    <td colspan="4" class="clearfix">


                                        <div class="float-right">

                                        </div><!-- End .float-right -->
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>



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

@endsection
