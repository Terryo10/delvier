@extends('layouts.supply')
@section('content')
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
                               
                            </tr>
                        </thead>
                         <tbody>
                                <tr>
                                <td>{{$item->product->name}}</td>
                                <td>${{$item->product->price}}</td>
                                <td>X {{$item->quantity}}</td>
                                <td>${{$item->quantity*$item->product->price}}</td>
                                <td>{{$item->status}}</td>
                                <td></td>
                                <td><a href="/parent/{{$item->order_id}}"><button class="btn btn-success">View Parent Order</button></a></td>
                                <td></td>
                                <td>Income</td>
                            </tr>
                           
                            
                        </tbody>

                       
                    </table>
                    <div class="row">
                     <div class="col-md-6">
                                         <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="/storage/product_images/{{$item['product']->firstImage}}" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">{{$item['product']->name}}</h5>
                                        
                                        <a href="/product/{{$item['product']->id}}" class="btn btn-primary">View Product</a>
                                    </div>
                                    </div>
                                  
                                       
                     </div>
                     <div class="col-md-6">
    <form class="form-horizontal" role="form" method="POST" action="{{route('item.update')}}">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
            <div class="form-group">
               <div class="form-group">
          <label for="exampleFormControlSelect2"> Current Order Status is
              "{{$item->status}}"
            </label><br>
        <label for="exampleFormControlSelect2"> Order Status select</label>
        <select name="status" multiple class="form-control" id="exampleFormControlSelect2">
       <option value="Packing For Delivery">Packing For Delivery</option>
        <option value="Packed For Delivery">Packed For Delivery</option>
         <option value="On its way to be delivered">On its way to be delivered</option>
         <option value="Item Delivered">Item Delivered</option>
       

        </select>
        </div>
        <div class="form-group">
        <input type="hidden" name="order_id" value="{{$item->id}}">
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
            </div>
        <hr>
       
    </form>
                     </div>
                    </div>

@endsection