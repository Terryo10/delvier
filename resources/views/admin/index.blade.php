@extends('layouts.adminlay')
@section('content')
                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary">
                            <div class="s-l">
                                <h5>Users</h5>
                                <p class="paragraph-agileits-w3layouts text-white">Number of users registered</p>
                            </div>
                            <div class="s-r">
                                <h6>{{$user->count()}}
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-success">
                            <div class="s-l">
                                <h5>Shops</h5>
                                <p class="paragraph-agileits-w3layouts">Number of shops registered</p>
                            </div>
                            <div class="s-r">
                                <h6>{{$shops->count()}}
                                    <i class="far fa-smile"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-danger">
                            <div class="s-l">
                                <h5>Orders</h5>
                                <p class="paragraph-agileits-w3layouts">Number of orders in system</p>
                            </div>
                            <div class="s-r">
                                <h6>{{$orders->count()}}
                                    <i class="fas fa-tasks"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-warning">
                            <div class="s-l">
                                <h5>Suppliers</h5>
                                <p class="paragraph-agileits-w3layouts">Number of suppliers</p>
                            </div>
                            <div class="s-r">
                                <h6>{{$supplier->count()}}
                                    <i class="fas fa-users"></i>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!--// Stats -->

@endsection