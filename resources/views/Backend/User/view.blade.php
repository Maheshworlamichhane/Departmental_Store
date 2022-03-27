<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Order Details</title>
    <style type="text/css">
        .box{
        width:600px;
        margin:0 auto;
        }
    </style>
</head>
    <body>
    <br />
    <div class="container">
        <h3 align="center">Order Details</h3><br />
        <div class="row">
        <div class="col-md-7" align="right">
        </div>
        </div>
        <br />
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Category Name </th>
            <th>Quantity </th>
            <th>Total</th>
            <th>Order Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>

            <td >{{ $order->id }}</td>
            <td class="name">{{ $order->name }}</td>
            <td class="email">{{ $order->email }}</td>
            <td class="manage_product_id">{{ $order->manage_product_id }}</td>
            <td class="product_name">{{ $order->product_name }}</td>
            <td class="product_price">{{ $order->product_price }}</td>
            <td class="category_name">{{ $order->category_name }}</td>
            <td class="quantity">{{ $order->quantity }}</td>
            <td class="total">{{ $order->total }}</td>
            <td class="created_at">{{ $order->created_at }}</td>
        </tr>
        <input type="hidden" name="user_id" value="{{ $order->user_id }}" class="user_id">
        @endforeach
        </tbody>
        </table>
        </div>

        <div id="paypal-button-container" class="w-25 p-3 mx-auto">

           {{-- <a onclick="cash_payment" href="{{   route('cashondelivery', $order) }}" type= "button" class="btn btn-danger w-100 fw-bold">Cash on delivery</a> --}}

        </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=ARl-tJdXklOZF-BcNrHn--IJTO7BiDNZSwKL0HbDBD-WIRJlc4OKbn_2-DEUftqRa7-E2NMuji5qRBjJ&currency=USD"></script>
    <script>
        paypal.Buttons({
          // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                amount: {
                value: '{{ $order->total }}' // Can reference variables or functions. Example: value: document.getElementById('...').value
                }
                }]
            });
            },
          // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
            return actions.order.capture().then(function(data) {

                var user_id = $('.user_id').val();
                var name = $('.name').text();
                var email = $('.email').text();
                var address = $('.address').text();
                var manage_product_id = $('.manage_product_id').text();
                var product_name = $('.product_name').text();
                var product_price = $('.product_price').text();
                var category_name = $('.category_name').text();
                var quantity = $('.quantity').text();
                var total = $('.total').text();
                $.ajax({
                    method:"POST",
                    url: "/order-payment",
                    data:{
                        '_token': "{{ csrf_token() }}",
                        'user_id': user_id,
                        'name': name,
                        'email': email,
                        'address':address,
                        'manage_product_id':manage_product_id,
                        'product_name':product_name,
                        'product_price' :product_price,
                        'category_name' :category_name,
                        'quantity':quantity,
                        'total': total,
                        'payment_mode':"Paid with Paypal",
                        'payment_id':data.id,
                    },
                    success:function(response){
                        swal(response.status);
                        window.location.href ="/redirects";
                    }
                });
        });
        }
        }).render('#paypal-button-container');
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

    </body>
</html>
