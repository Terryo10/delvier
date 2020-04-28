@extends('layouts.adminlay')
@section('content')
 <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">Create Category</h2>
            <!--// main-heading -->

<!-- Forms-2 -->
                        <div class="outer-w3-agile col-xl mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Category Name</h4>
                            <form action="{{route('category.store')}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Category Name</label>
                                    <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Category Name" required=""> 
                                </div>
                                <div class="control-group input-group" style="margin-top:10px">
                                   
                                  <input type="file" name="image" id="fileToUpload">
                                  
                                </div>
                              
<button class="btn btn-success"type="submit">submit</button>
                             
                            </form>
                        </div>
                        <!--// Forms-2 -->
@endsection