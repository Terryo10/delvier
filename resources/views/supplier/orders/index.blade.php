@extends('layouts.supply')
@section('content')

<!-- table1 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Ordered Item Table</h4>
                    <div class="form-group">
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search By Order items..">
                    </div>
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Ordered Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">QTY Orderd</th>
                                <th scope="col">Paid</th>
                                 <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">View Order</th>
                                <th scope="col">Reduction %</th>
                                <th scope="col">Income</th>
                                
                                <th scope="col">Payout Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)
                            <tr>
                                
                                <td>{{$item->product->name}}</td>
                                <td>${{$item->product->price}}</td>
                                <td>X {{$item->quantity}}</td>
                                <td>${{$item->quantity*$item->product->price}}</td>
                                <td>{{$item->status}}</td>
                                <td><a href="/deliver/order_item/{{$item->id}}"><button class="btn btn-success">Delivery</button></a></td>
                                <td><a href="/parent/{{$item->order_id}}"><button class="btn btn-success">View Parent Order</button></a></td>
                                <td>{{$item->commision}} %</td>
                            <td>$ {{$item->quantity*$item->product->price-($item->quantity*$item->product->price*($item->commision/100))}}</td>
                           
                            <td>{{$item->payout}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>

                       

                       
                    </table>
                </div>
                <!--// table1 -->
<script>
    function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>
@endsection