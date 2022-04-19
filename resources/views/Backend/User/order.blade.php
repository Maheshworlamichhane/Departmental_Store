<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css\style3.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Make Order</title>
</head>

<body>
    <div class="pl-3">
        <a href="{{url('/redirects')}}">
            <div class="pt-2 pb-2">
                <button class="px-4 py-2 text-sm font-medium leading-5 text-light btn btn-danger">
                    Back
                </button>
            </div>
         </a>
    </div>
    <div class="container mt-5 ">
        <h2 class=" text-danger">Making Order</h2>
         {{-- <button class="btn btn-primary printstock" onclick="window.print();" >Print</button> --}}

        {{-- <div>
            <a class="alert-danger">

                @error('user_id'){{$message}}
                @enderror
                @error('name'){{$message}}
                @enderror
                @error('email'){{$message}}
                @enderror
                @error('manage_product_id'){{$message}}
                @enderror
                @error('product_name'){{$message}}
                @enderror
                @error('product_price'){{$message}}
                @enderror
                @error('category_name'){{$message}}
                @enderror
                @error('product_quantity'){{$message}}
                @enderror
                @error('quantity'){{$message}}
                @enderror
                @error('total'){{$message}}
                @enderror
            </a>
        </div> --}}
            <div class="row">
                <div class="col-sm-9">
                    <form action="{{ route('ordercreate') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input id="user_id" class="form-control" name="user_id" value="{{ Auth::user()->id }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="string" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                        </div>

                        <!-- product id -->
                        <input type="hidden" name="manage_product_id" value="{{ $pro->id }}">

                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Image </label><br>
                            <img src="{{ url('/uploads/products') }}/{{ $pro->image }}" alt="product_image" width="200px" height="200px">
                        </div>

                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name </label>
                            <input type="text" class="form-control " id="product_name" name="product_name" value="{{ $pro->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price </label>
                            <input type="biginteger" class="form-control changevalue" id="product_price" name="product_price" value="{{ $pro->price }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="string" class="form-control" id="category_name" name="category_name" value="{{ $pro->categories->name }}" readonly>
                        </div>
                            <div class="mb-3">
                            <label for="product_quantity" class="text-danger fs-3"> Available Stock: {{ $pro->quantity }}</label><br>

                            <label for="quantity" class="form-label"> Quantity </label>&nbsp; &nbsp;&nbsp;
                            <label for="error" id="error" style="color: red"></label>
                            <input type="quantity" class="form-control changevalue" id="quantity" name="quantity"
                                onkeyup="quantityValidation()">
                        </div>
                        <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="biginteger" class="form-control" id="total" name="total" readonly>
                        </div>
                        <button type="submit" class="btn btn-danger " id="button">Make Order</button>
                    </form>
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                </div>

                <div class="col-sm-9 mt-5">
                <h2 class=" text-danger">Order List</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price </th>
                            <th scope="col">Category Name </th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th>{{$order->id}}</th>
                                <th>{{$order->user_id}}</th>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->manage_product_id}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->product_price}}</td>
                                <td>{{$order->category_name}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->total }}</td>
                                <td>{{$order->total }}</td>
                                {{-- <td><a href="">Download</a></td> --}}
                                {{-- {{$order->total}} --}}
                                {{-- {{ $order->quantity * $pro->price }} --}}
                                <td>
                                    {{-- <a href="{{ url('/editorder', $order->id) }}" class="btn btn-info btn-sm">Edit</a> --}}
                                    <a href="{{ url('/vieworder', $order->id) }}" class="btn btn-success btn-sm">View</a>
                                    <a href="{{ url('/deleteorder', $order->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
    <script src="{{ url('js/script.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type= "text/javascript">
        $(".changevalue").change(function(e){
            var quantity = $("#quantity").val();
            var price = $("#product_price").val();
            var total = quantity * price;
            $("#total").val(total);
        })
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $( "#manage_product_id" ).change(function () {
        var id = $(this).val();

        $.ajax({
            url:'{{url('get_products') }}/'+id,
            type: 'get',
            dataType:'json',
            success: function($response){
                var price =JSON.parse(JSON.stringify($response.price));
                var product_quantity =JSON.parse(JSON.stringify($response.product_quantity));
                var name =JSON.parse(JSON.stringify($response.name));
                var category_name =JSON.parse(JSON.stringify($response.category_name));
                $("#product_name").val(name);
                $("#product_price").val(price);
                $("#product_quantity").val(product_quantity);
                $("#category_name").val(category_name);
            }
        })
        });
    </script>
    <script>
        $( "#user_id" ).change(function () {
        var id = $(this).val();

        $.ajax({
            url:'{{url('get_userss') }}/'+id,
            type: 'get',
            dataType:'json',
            success: function($show){
                var name =JSON.parse(JSON.stringify($response.name));
                var email =JSON.parse(JSON.stringify($response.email));
                var address =JSON.parse(JSON.stringify($response.address));
                $("#name").val(name);
                $("#email").val(email);
                // $("#address").val(address);
            }
        })
        });
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
