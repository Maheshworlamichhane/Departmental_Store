{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Manage Staff</title>
</head>

<body> --}}
    {{-- @extends('layouts.Admin.main')
    @section('dashboard')
    <div class="container mt-5 " id="container">
        <h2 class=" text-danger">Adding Products</h2>
            <div class="row" >
                <div class="col-sm-9 ">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 ">
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
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                </div>

                <div class="col-sm-9">
                    <h2 class=" text-danger">Total Product</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $pro)
                            <tr>
                                <th>{{$pro->id}}</th>
                                <td>{{$pro->name}}</td>
                                <td>{{$pro->price}}</td>
                                <td>{{$pro->quantity}}</td>
                                <td>{{$pro->image}}</td>

                                <td>
                                    <img src="{{ asset('uploads/products/'.$pro->image) }}" width="90px" height="70px" alt="Image">
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
            </div>
    </div>
    @endsection --}} 

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
</html>
