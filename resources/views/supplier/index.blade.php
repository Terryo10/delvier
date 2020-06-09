@extends('layouts.supply')
@section('content')
<!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between bg-primary">
                            <div class="s-l">
                            <h5>{{auth::user()->name}}</h5>
                                <p class="paragraph-agileits-w3layouts text-white">WELCOME TO SUPPLIERS DASHBOARD</p>
                            </div>
                            <div class="s-r">
                                <h6>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div>
                       
                       
                    </div>
                    <!--// Stats -->

@endsection