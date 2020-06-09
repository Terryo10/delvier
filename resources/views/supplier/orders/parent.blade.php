@extends('layouts.supply')
@section('content')
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-lg-last dashboard-content">
                    <h2>Order {{$order->id}}</h2>


                        <div class="mb-4"></div><!-- margin -->

                        <h3></h3>

                        <div class="row">
                            <div class="col-md-12">
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
                                            ORDER STATUS: {{$order->status}}
                                            <br>
                                            <br>
                                            <br>
                                          
                                            </p>
                                        
                                    </div><!-- End .card-body -->
                                </div><!-- End .card -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-12">
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
                            @foreach ($items as $item)
                                <tr>
                                
                                <td>{{$item->product->name}}</td>
                                <td>${{$item->product->price}}</td>
                                <td>X {{$item->quantity}}</td>
                                <td>${{$item->quantity*$item->product->price}}</td>
                                <td>{{$item->status}}</td>
                               
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                                    
                        </div>
                            </div><!-- End .card-body -->
                        </div><!-- End .card -->
                    </div><!-- End .col-lg-9 -->

                    
                </div><!-- End .row -->
            </div><!-- End .container -->
@endsection