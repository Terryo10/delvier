@extends('layouts.final')
@section('content')


            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order {{$order->id}}</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content">
                    <h2>Order {{$order->id}}</h2>


                        <div class="mb-4"></div><!-- margin -->

                        <h3></h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Order Information

                                    </div><!-- End .card-header -->

                                    <div class="card-body">

                                          <h3>ORDER REF: {{$order->id}}</h3>
                                            <p>
                                            CREATED ON: {{$order->created_at}}<br>
                                            PAYMENT STATUS: {{$order->paymentStatus}}<br>
                                            TRANSACTION REF: {{$order->transaction_ref}}<br>
                                            ORDER STATUS: {{$order->status}}<br>
                                                SHIPPING VIA : {{$order->carrier}}
                                            <br>

                                            </p>
                                        <a href="{{$order->trackerUrl}}" class="btn btn-block btn-sm btn-primary">View Order tracking here</a>
                                    </div><!-- End .card-body -->
                                </div><!-- End .card -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Delivery Information

                                    </div><!-- End .card-header -->

                                    <div class="card-body">
                                        <h3>Address: {{$delivery->address}}</h3>
                                        <p>Country: {{$delivery->country}}
                                        <br>City: {{$delivery->city}}
                                        <br>Phone: {{$delivery->phone}}
                                        <br>Firstname: {{$delivery->firstname}}
                                        <br>Lastname: {{$delivery->lastname}}
                                    </p>
                                    </div><!-- End .card-body -->
                                </div><!-- End .card -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->

                        <div class="card">
                            <div class="card-header">
                                Products In Order
                                <a href="#" class="card-edit">Edit</a>
                            </div><!-- End .card-header -->

        <div class="card-body">
                        <div class="row">
                        <table class="table" id="myTable">
                        <thead>
                            <tr>

                                <th scope="col">Ordered Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">QTY Orderd</th>
                                <th scope="col">Paid</th>
                                 <th scope="col">Status</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_items as $item)
                                <tr>

                                <td>{{$item->product->name}}</td>
                                <td>${{$item->product->price}}</td>
                                <td>X {{$item->quantity}}</td>
                                <td>${{$item->quantity*$item->product->price}}</td>
                                <td>{{$item->status}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                        </table>

                        </div>
    </div><!-- End .card-body -->
                        </div><!-- End .card -->
                    </div><!-- End .col-lg-9 -->

                    <aside class="sidebar col-lg-3">
                        <div class="widget widget-dashboard">
                            <h3 class="widget-title">My Account</h3>

                            <ul class="list">
                                <li class="active"><a href="#">Account Dashboard</a></li>
                                <li><a href="#">Change Password</a></li>
                                <li><a href="/home">My Orders</a></li>

                            </ul>
                        </div><!-- End .widget -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
@endsection
