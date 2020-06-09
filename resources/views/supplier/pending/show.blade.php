@extends('layouts.supply')
@section('content')
    <table class="table" id="myTable">
        <thead>
        <tr>

            <th scope="col">Ordered Item</th>
            <th scope="col">Price</th>
            <th scope="col">QTY Orderd</th>


        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$pending->cart_item->product->name}}</td>
            <td>${{$pending->cart_item->product->price}}</td>
            <td>X {{$pending->cart_item->quantity}}</td>

        </tr>


        </tbody>


    </table>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/storage/product_images/{{$pending->cart_item['product']->firstImage}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$pending->cart_item['product']->name}}</h5>

                    <a href="/product/{{$pending->cart_item['product']->id}}" class="btn btn-primary">View Product</a>
                </div>
            </div>


        </div>
        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" action="{{route('pending.update')}}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2"> Current Order Status is
                            @if($pending->proceed_to_payment = 0)
                                "User cannot pay yet waiting for your shipping price"
                                @else
                                "User can procced to payment using the current shipping price {{$pending->shipping_price}}"
                            @endif
                        </label><br>
                        <label for="exampleFormControlSelect2"> Update shipping price</label>
                        <input type="number" class="form-group" name="shipping_price">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="proceed_to_payment" value="1">
                        <input type="hidden" name="pending_id" value="{{$pending->id}}">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
                <hr>

            </form>
            <div>
                <h4>Destination address</h4>
                {{$address}}
            </div>
        </div>


    </div>

@endsection
