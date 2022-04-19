<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title class="text-white bg-dark">Edit Product</title>
</head>
<body>
    <div class="pl-3">
        <a href="{{route('productcreate')}}">
            <div class="pt-2 pb-2">
                <button class="px-4 py-2 text-sm font-medium leading-5 text-light btn btn-danger">
                    Back
                </button>
            </div>
         </a>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                {{-- <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="price" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="quantity" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
                      </div>
                    <div class="mb-3">
                        <label for="">Product Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{ asset('uploads/products/'.$product->image) }}" width="90px" height="70px" alt="Image">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <button href="/manageproduct" class="btn btn-danger">Back</button>

                  </form>
            </div>
        </div>
    </div> --}}
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select text-danger  text-weight-bold" name="category_id"
                aria-label="Default select example" id="category_id">
                <option selected="selected">---- Select Category ----</option>
                @foreach ($category as $cat)
                <option value="{{ $cat->id }}">
                    {{ ($cat->name) }}
                </option>
                @endforeach
            </select>
            <div class="mb-3 ">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="name" class="form-control" id="category_name" name="category_name" >
            </div>
        </div>
        <div class="mb-3">
            <label for="in_stock_id" class="form-label">Products</label>
            <select class="form-select text-danger  text-weight-bold" name="in_stock_id"
                aria-label="Default select example" id="in_stock_id">
                <option selected="selected">---- Select Product ----</option>
                @foreach ($stocks as $in)
                <option value="{{ $in->id }}">
                    {{ ($in->name) }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ">
            <label for="name" class="form-label">Product Name</label>
            <input type="name" class="form-control" id="name" name="name" readonly>
        </div>
        <div class="mb-3">
            <label for="stock_quantity" class="text-danger"> Available Stock</label><br>
            <input type="biginteger" class="form-control" id="stock_quantity" name="stock_quantity" readonly>
            <label for="quantity" class="form-label"> Quantity </label>&nbsp; &nbsp;&nbsp;
            <label for="error" id="error" style="color: red"></label>
            <input type="quantity" class="form-control changevalue" id="quantity" name="quantity"
                onkeyup="categoryValidation()">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="biginteger" class="form-control changeQuantity" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="biginteger" class="form-control " id="total" name="total">
        </div>
        <div class="mb-3">
            <label for="">Product Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('uploads/products/'.$product->image) }}" width="90px" height="70px" alt="Image">
        </div>
        {{-- <div class="mb-3">
            <label for="">Product Image</label>
            <input type="file" name="image" class="form-control">
        </div> --}}
        <button type="submit" class="btn btn-danger">Update Product</button>
        <div>
            <a class="alert-danger">
                @error('category_id'){{$message}}
                @enderror
                @error('category_name'){{$message}}
                @enderror
                @error('in_stock_id'){{$message}}
                @enderror
                @error('name'){{$message}}
                @enderror
                @error('stock_quantity'){{$message}}
                @enderror
                @error('quantity'){{$message}}
                @enderror
                @error('price'){{$message}}
                @enderror
                @error('total'){{$message}}
                @enderror
            </a>
        </div>
    </form>
    @if (session()->has('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(".changeQuantity").change(function(e){
var quantity = $("#quantity").val();
var price = $("#price").val();
var total = quantity * price;
$("#total").val(total);
})

</script>
<script>
$( "#in_stock_id" ).change(function () {
var id = $(this).val();

$.ajax({
url:'{{url('get_stocks') }}/'+id,
type: 'get',
dataType:'json',
success: function($res){
    var name =JSON.parse(JSON.stringify($res.name));
    var  stock_quantity =JSON.parse(JSON.stringify($res.stock_quantity));
    $("#name").val(name);
    $("#stock_quantity").val(stock_quantity);
}
})
});
</script>
<script>
    $( "#category_id" ).change(function () {
    var id = $(this).val();

    $.ajax({
        url:'{{url('get_categories') }}/'+id,
        type: 'get',
        dataType:'json',
        success: function($resp){
            var category_name =JSON.parse(JSON.stringify($resp.category_name));
            $("#category_name").val(category_name);
        }
    })
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
</html>
