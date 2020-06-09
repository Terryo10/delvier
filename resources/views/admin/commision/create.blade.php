@extends('layouts.adminlay')
@section('content')
Create Comission Here

<div class="outer-w3-agile col-xl mt-3">
 <h4 class="tittle-w3-agileits mb-4">Percentage</h4>
 <form action="{{route('commision.store')}}" method="post"  >
     @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">This is the percentage thats going to be charged on suppliers</label>
    <input type="number" name="percentage" class="form-control" id="exampleFormControlInput1" placeholder="Enter Percentage Here" required=""> 
    </div>
                             
                              
<button class="btn btn-success"type="submit">submit</button>
                             
                            </form>
                        </div>

@endsection 
