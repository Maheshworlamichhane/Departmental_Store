
@extends('layouts.Admin.main')
@section('dashboard')
    <div class="container mt-5 " id="container">
    <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Adding Products

      </button>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Adding Products</h5>
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
                            <label for="supplier" class="form-label">Supplier Name</label>
                            <input type="supplier" class="form-control" id="supplier" name="supplier">
                        </div>
                        <button type="submit" class="btn btn-danger" >Add Product</button>
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
            <h2 class=" text-danger">Major Supplies</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $in)
                    <tr>
                        <th>{{$in->id}}</th>
                        <td>{{$in->name}}</td>
                        <td>{{$in->quantity}}</td>
                        <td>{{$in->supplier}}</td>
                        <td>
                            <a href="{{ url('/instockedit', $in->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ url('/instockdelete', $in->id) }}"
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
