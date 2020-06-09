@extends('layouts.supply')
@section('content')
<!-- main-heading -->
<h2 class="main-title-w3layouts mb-2 text-center">Create Product</h2>
            <!--// main-heading -->
                <!-- Forms-2 -->
                        <div class="outer-w3-agile col-xl mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Form Controls</h4>
                            <form action="{{route('product.store')}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Product Name</label>
                                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                </div>
                                <div class="form-group">
                                     <input name="shop_id" type="hidden" value="{{$shops->id}}" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                   
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2"> Category select</label>
                                    <select name="category_id" multiple class="form-control" id="exampleFormControlSelect2" required="">
                                       @foreach ($category as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                       @endforeach

                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Price</label>
                                    <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Minimum Order Quantity (MOQ)</label>
                                    <input type="number" name="minOrder" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantity</label>
                                    <input type="number" name="qty" class="form-control" id="exampleFormControlInput1" placeholder="" required=""> 
                                </div>
                                <br>
                                 <label for="exampleFormControlInput1">Product Face Image</label>
                                 <br>
                                <div class="control-group input-group" style="margin-top:10px">
                                   
                                  <input type="file" name="firstImage" id="fileToUpload">
                                  
                                </div>
                                <div class="form-group"> 
                                    <label for="exampleFormControlInput1">Weight Note: Weights are in OUNCES (OZ)</label>
                                    <input type="number" name="weight" class="form-control" id="exampleFormControlInput1" placeholder="0.0" required="" step=any> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Length</label>
                                    <input type="number" name="length" class="form-control" id="exampleFormControlInput1" placeholder="0.0" required="" step=any> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">width</label>
                                    <input type="number" name="width" class="form-control" id="exampleFormControlInput1" placeholder="0.0" required="" step=any> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">height</label>
                                    <input type="number" name="height" class="form-control" id="exampleFormControlInput1" placeholder="0.0" required="" step=any> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description</label>
                                    <textarea name="description"class="form-control" id="exampleFormControlTextarea1" rows="3" required=""></textarea>
                                </div>
                                <br>
                                <label for="exampleFormControlTextarea1">Complementing image</label><br>
                                <div class="input-group control-group increment" >
                                    
                                    <input type="file" name="image[]" class="form-control">
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                                </div>
                               <div class="clone hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="image[]" class="form-control">
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                                </div>
                                <div>
                                <button type="submit" class="btn btn-primary">Submit to system</button>
                                </div>
                           

                                
                            </form>
                        </div>
                        <!--// Forms-2 -->


    <script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

@endsection