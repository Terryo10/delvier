@extends('layouts.adminlay')
@section('content')
   

    <form class="form-horizontal" role="form" method="POST" action="{{route('usersm.update',$user->id)}}">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
            <div class="form-group">
               <div class="form-group">
          <label for="exampleFormControlSelect2"> Current user role is 
              @if ($user->role == 10)
                    Admin
              @elseif($user->role == 1)
                    Supplier
              @else
                    General User
              @endif
            </label><br>
        <label for="exampleFormControlSelect2"> Role select</label>
        <select name="role" multiple class="form-control" id="exampleFormControlSelect2">
       <option value="0">General User</option>
        <option value="1">Supplier</option>
         <option value="10">Admin</option>
       

        </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
            </div>
        <hr>
       
    </form>
@endsection