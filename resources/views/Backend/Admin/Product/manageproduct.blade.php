
    @extends('layouts.Admin.main')
    @section('dashboard')
    <div class="container mt-3 " id="container">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Product
          </button>
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
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-9 ">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select text-danger text-weight-bold" name="category_id"
                                aria-label="Default select example" id="category_id">
                                <option selected="selected">---- Select Category ----</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ ($cat->name) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 ">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="name" class="form-control" id="category_name" name="category_name" >
                        </div>
                        <div class="mb-3">
                            <label for="in_stock_id" class="form-label">Products</label>
                            <select class="form-select text-danger text-weight-bold" name="in_stock_id"
                                aria-label="Default select example" id="in_stock_id">
                                <option selected="selected">---- Select Product ----</option>
                                @foreach ($stocks as $in)
                                <option value="{{ $in->id }}">
                                    {{ ($in->name) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                            {{-- <div class="mb-3 ">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="price" class="form-control" id="price" name="price">
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="quantity" class="form-control" id="quantity" name="quantity">
                                </div>
                            <div class="mb-3">
                                <label for="">Product Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form> --}}
                        <div class="mb-3 ">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="name" class="form-control" id="name" name="name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="stock_quantity" class="text-danger fs-3"> Available Stock</label><br>
                            <input type="biginteger" class="form-control" id="stock_quantity" name="stock_quantity"
                                readonly>
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
                            <input type="file" name="image" class="form-control" width="100px" height="100px" alt="Image">
                        </div>
                        <button type="submit" class="btn btn-danger" id="button">Add Product</button>
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
            </div>
            <div class="row mt-3" >


        {{-- <div class="max-w-2xl px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs"> --}}



                <div class="col-sm-9 badge bg-light">
                    <h2 class=" text-danger">Total Product</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            {{-- <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th> --}}
                            <th scope="col">ID</th>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Category</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">QR Code</th>
                            <th scope="col">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $pro)
                            <tr>
                                {{-- <th>{{$pro->id}}</th>
                                <td>{{$pro->name}}</td>
                                <td>{{$pro->price}}</td>
                                <td>{{$pro->quantity}}</td>
                                <td>{{$pro->image}}</td> --}}
                                <th>{{$pro->id}}</th>
                                <th>{{$pro->in_stock_id}}</th>
                                <td>{{$pro->name}}</td>
                                <td>{{$pro->quantity}}</td>
                                <td>{{$pro->price}}</td>
                                <td>{{$pro->total}}</td>
                                <td>{{$pro->category_id}}</td>
                                <td>{{$pro->category_name}}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$pro->image) }}" width="50px" height="30px" alt="Image">
                                </td>
                                <td>
                                    <div class="qrcode">
                                        {!! QrCode::size(80)->generate(
                                        " Product ID:$pro->id, Stock ID:$pro->in_stock_id, Product Name:$pro->name, Product Price:$pro->price, Total Price:$pro->total, Category ID:$pro->category_id, Quantity:$pro->quantity"
                                        ); !!}
                                    </div>
                                </td>
                                 <td>
                                    <a href="{{ url('/productedit', $pro->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/productdelete', $pro->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

{{--
        </div>
            </div> --}}
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
 @endsection
