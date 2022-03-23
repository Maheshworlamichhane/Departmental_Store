
@extends('layouts.Admin.main')
@section('dashboard')
    <div class="container mt-5 " id="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add Total Stocks Details

          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Adding Stocks</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-9">
                        <form action="" method="POST" >
                            @csrf
                            <div class="mb-3 ">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="name" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3 ">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="quantity" class="form-control" id="quantity" name="quantity">
                            </div>
                            <div class="mb-3 ">
                                <label for="price" class="form-label">Price</label>
                                <input type="price" class="form-control" id="price" name="price">
                            </div>
                            <div class="mb-3 ">
                                <label for="category" class="form-label">Category</label>
                                <input type="category" class="form-control" id="category" name="category">
                            </div>
                            <div class="mb-3 ">
                                <label for="supplier" class="form-label">Supplier</label>
                                <input type="supplier" class="form-control" id="supplier" name="supplier">
                            </div>
                            <div class="mb-3 ">
                                <label for="total" class="form-label">Total</label>
                                <input type="total" class="form-control" id="total" name="total">
                            </div>
                            <button type="submit" class="btn btn-danger">Add</button>
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
    <div class="row">

        <div class="col-sm-9 mt-5">
            <h2 class=" text-danger">Total Products</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $to)
                    <tr>
                        <th>{{$to->id}}</th>
                        <td>{{$to->name}}</td>
                        <td>{{$to->quantity}}</td>
                        <td>{{$to->price}}</td>
                        <td>{{$to->category}}</td>
                        <td>{{$to->supplier}}</td>
                        <td>{{$to->total}}</td>
                        <td>
                            <a href="{{ url('/totalstockedit', $to->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ url('/totalstockdelete', $to->id) }}"
                                class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
