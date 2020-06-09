@extends('layouts.adminlay')
@section('content')

Customise comision Percentage
<br>
<p>N.B do not create 2 commisions</p>
<a href="/commision/create"><button class="btn btn-success">Create Commision</button></a>



             <!-- table3 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Commision</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Commision ID</th>
                               
                                 <th scope="col">Active Pecentage</th>
                                 <th scope="col">Action</th>
                                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commision as $items)
                            <tr>
                            <th scope="row">{{$items->id}}</th>
                            <td>{{$items->percentage}} %</td>
                            <td><a href="/commision/{{$items->id}}/edit"><button class="btn btn-danger" >Edit </button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--// table3 -->


@endsection