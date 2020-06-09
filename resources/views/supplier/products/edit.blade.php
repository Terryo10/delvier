@extends('layouts.supply')
@section('content')
<div class="row">
    @if($product->quantity > 0)
 <div class="col-md-6">
 <form method="post" action="/producto/{{$product->id}}">
    @csrf
            <div class="form-group">
            <label for="exampleFormControlInput1">Number of {{$product->name}}'s in stock is {{$product->quantity}}</label>
             <input type="hidden" name="quantity" class="form-control" value="0" id="exampleFormControlInput1" placeholder="" required=""> 
            </div>
            <button type="submit" class="btn btn-primary">Set product as out of stock</button>
        </form>
    </div>


    @else
    <div class="col-md-6">
        <form method="post" action="/producto/{{$product->id}}">
            @csrf
            <div class="form-group">
            <label for="exampleFormControlInput1">Number of {{$product->name}}'s in stock is set to {{$product->quantity}}</label>
            <label for="exampleFormControlInput1">Stock Update</label>
             <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="put new quantity number" required=""> 
            </div>
            <button type="submit" class="btn btn-primary">Set new stock</button>
        </form>
    </div>
    @endif
   
    
</div>


@endsection