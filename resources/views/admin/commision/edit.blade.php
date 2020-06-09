@extends('layouts.adminlay')
@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{route('commision.update',$results->id)}}">
      {{method_field('PATCH')}}
      {{ csrf_field() }}
            <div class="form-group">
               <div class="form-group">
          <label for="exampleFormControlSelect2"> Current Percentage is {{$results->percentage}}
            <div class="form-group">
             <label for="exampleFormControlInput1">Category Name</label>
                <input type="number" name="percentage" class="form-control" id="exampleFormControlInput1" placeholder="{{$results->percentage}} %" required=""> 
                </div>
        <label for="exampleFormControlSelect2">Edit here</label>
      
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
            </div>
        <hr>
       
    </form>

@endsection 