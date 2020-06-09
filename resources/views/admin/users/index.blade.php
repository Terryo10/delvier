@extends('layouts.adminlay')
@section('content')
 <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Users</h2>
            <!--// main-heading -->
                <ul class="prof-widgt-content">
                            <li class="menu">
                                <ul>
                                    <li class="button">
                                        <a href="#">
                                            <i class="fas fa-envelope"></i> USERS ACTIONS
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <ul class="icon-navigation">
                                            <li>
                                                <a href="/category/create">View Blocked
                                                    <span class="float-right"></span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
 <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">all Users</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">User Name</th>
                               
                                 <th scope="col">Email</th>
                                  <th scope="col">Action</th>
                                 <th scope="col">Role</th>
                                 <th scope="col">Action</th>
                                 
                                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $items)
                            <tr>
                            <th scope="row">{{$items->name}}</th>
                            <th scope="row">{{$items->email}}</th>
                            @if ($items->role == 1)
                                <th scope="row">Supplier</th>
                            @elseif($items->role == 10)
                                <th scope="row">ADMIN</th>
                            @else
                                <th scope="row">General User</th>
                            @endif
                            
                            <td><a href="/user/{{$items->id}}"><button  class="btn btn-primary" >Edit User Role</button></a></td>
                            <td><a href="/userview/{{$items->id}}"><button  class="btn btn-success" >View </button></a> </td>
                           

                                
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