@extends('layouts.adminlay')
@section('content')
   <form method="post" action="route('users.edit', $user)">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <div class="form-group">
        <label for="exampleFormControlInput1"> Name</label>
    <input class="form-control" type="text" name="name"  value="{{ $user->name }}" />
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
    <input class="form-control" type="email" name="email"  value="{{ $user->email }}" />
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
    <input class="form-control" type="password" name="password" />
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">password confirmation</label>
    <input class="form-control" type="password" name="password_confirmation" />
    </div>
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
        <select name="category_id" multiple class="form-control" id="exampleFormControlSelect2">
       <option value="0">General User</option>
        <option value="1">Supplier</option>
         <option value="10">Admin</option>
       

        </select>
        </div>
    <div class="form-group"> 
    <button class="btn btn-danger"type="submit">Send</button>
    </div>
    </form> 
@endsection