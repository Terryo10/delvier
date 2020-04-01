@extends('layouts.supply')
@section('content')
  <!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">{{$shop->name}}</h2>
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
                                                <a href="/product/create">Create Product
                                                    <span class="float-right"></span>
                                                </a>
                                         
                                           
                                          
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                          

                          <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">all Products</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                 <th scope="col">Action</th>
                                  <th scope="col">Action</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $items)
                            <tr>
                            <th scope="row">{{$items->name}}</th>
                            <td>${{$items->price}}.00</td>
                       
                            <td><a href="/storage/ccc_images/{{$items->imagepath}}"><button class="btn btn-danger">Edit Product</button></a></td>
                            
                            <td>
                            <form class="delete_form" method="POST" action="{{action('ProductController@destroy',$items->id)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" >DELETE </button></td>
                                </form>
                                 <td><a href="/storage/ccc_images/{{$items->imagepath}}"><button class="btn btn-success">View Product</button></a></td>

                                
                            </tr>
                            @endforeach
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