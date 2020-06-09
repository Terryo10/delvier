@extends('layouts.supply')
@section('content')
    <div class="outer-w3-agile mt-3">
        <h4 class="tittle-w3-agileits mb-4">Pending Orders</h4>

        <table class="table" id="myTable">
            <thead>
            <tr>
                <th scope="col">Ordered Item</th>
                <th scope="col">Price per item</th>
                <th scope="col">QTY Orderd</th>
                <th scope="col">Shipping Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($pending as $item)
                <tr>

                    <td>{{$item->cart_item->product['name']}}</td>
                    <td>${{$item->cart_item->product['price']}}</td>
                    <td>X {{$item->cart_item->quantity}}</td>
                    <td>$ {{$item->shipping_price}}</td>
                    @if($item->procced_to_payment == true)
                    <td>Waiting For Payment</td>
                        @else
                        <td>Waiting for your shipping price</td>
                    @endif
                    <td><a href="/supplier/show/{{$item->id}}" class="btn btn-success">Update Order settings</a></td>
                </tr>
            @endforeach

            </tbody>




        </table>
    </div>
    <!--// table1 -->
    @endsection
