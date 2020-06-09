@extends('layouts.supply')
@section('content')
  <!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">{{auth::user()->name}}'s Shop Sector</h2>
            <!--// main-heading -->
                <ul class="prof-widgt-content">
                            <li class="menu">
                                <ul>
                                    <li class="button">
                                        <a href="#">
                                            <i class="fas fa-envelope"></i> SHOP ACTIONS
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <ul class="icon-navigation">
                                            <li>
                                                <a href="/supplier/shops">View All Shops
                                                    <span class="float-right"></span>
                                                </a>
                                            </li>
                                            @if ($shops == !null)
                                            <li>
                                                <a href="#">You cannot create More than 1 shop
                                                    <span class="float-right"></span>
                                                </a>
                                            </li>
                                            @else
                                                 <li>
                                                <a href="/shop/create">Create Your Shop
                                                    <span class="float-right"></span>
                                                </a>
                                            </li>
                                            @endif
                                           
                                          
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>


                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">My Shop</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Shop Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Telephone</th>
                                 <th scope="col">Action</th>
                                  <th scope="col">Action</th>
                                                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                           @if ($shops == !null)
                                    <th scope="row">{{$shops->name}}</th>
                            <td>{{$shops->description}}</td>
                            <td>{{$shops->phone}}</td>
                            <td>
                            <form class="delete_form" method="POST" action="{{action('ShopController@destroy',$shops->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" >DELETE </button></td>
                                </form>
                            <td><a href="/shop/{{$shops->id}}"><button class="btn btn-success">View / Manage Shop</button></a></td>

                           @endif
                            
                       
                                
                            </tr>
                     
                        </tbody>
                    </table>
                </div>
                <!--// table3 -->

                <script>
                    $(document).ready(function(){

                         $('.delete_form').on ('submit', function(){
                    if(confirm("are you sure you want to delete it ?"))
                    {
                        return true;
                    }
                    else{
                        return false;
                    }
                });

                    });
               
                </script>

@endsection