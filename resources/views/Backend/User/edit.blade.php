<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <h4>Manage Order</h4><br>

                <form action="" method="POST" >
                    @csrf
                    @method('PUT')
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input id="user_id" class="form-control" name="user_id" value="{{ $order->id }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $order->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="string" class="form-control" id="email" name="email" value="{{ $order->email }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="manage_product_id" class="form-label">Products</label>
                            <select class="form-select" name="manage_product_id" aria-label="Default select example" id="manage_product_id">
                            <option selected="selected">---- Select Product ----</option>
                            @foreach ($products as $pro)
                                <option value="{{ $pro->id }}">
                                {{ ($pro->name) }}({{ ($pro->price) }})
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name </label>
                            <input type="text" class="form-control " id="product_name" name="product_name" value="{{ $order->product_name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price </label>
                            <input type="biginteger" class="form-control changevalue" id="product_price" name="product_price" value="{{ $order->product_price }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="quantity" class="form-control changevalue" id="quantity" name="quantity" value="{{ $order->quantity }}" >
                        </div>
                        <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="biginteger" class="form-control" id="total" name="total" value="{{ $order->total }}" readonly >
                        </div>

                        <button type="submit" class="btn btn-danger">Update Order</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
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
                // console.log($response);
                var price =JSON.parse(JSON.stringify($response.price));
                var name =JSON.parse(JSON.stringify($response.name));
                $("#product_name").val(name);
                $("#product_price").val(price);
            }
        })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
</html>
