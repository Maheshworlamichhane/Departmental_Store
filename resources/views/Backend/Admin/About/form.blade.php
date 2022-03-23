    @extends('layouts.Admin.main')
    @section('dashboard')

    <div class="container mt-5 " id="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add About
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">About</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 ">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="description" class="form-control" id="description" name="description">
                    {{-- <label for="Textarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="Textarea1"></textarea> --}}
                  </div>

                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
            <div class="row" >
                {{-- <div class="col-sm-9 ">

                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                </div> --}}

                <div class="col-sm-9">
                    {{-- <h2 class=" text-danger">Form</h2> --}}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            {{-- <th scope="col">Password</th> --}}
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                              @foreach ($forms as $for)
                            <tr>
                                <th>{{$for->id}}</th>
                                <td>{{$for->name}}</td>
                                <td>{{$for->description}}</td>
                                <td>{{$for->image}}</td>

                                <td>
                                    <img src="{{ asset('uploads/products/'.$for->image) }}" width="90px" height="70px" alt="Image">
                                </td>
                                 <td>
                                    <a href="{{ url('/formedit', $for->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/formdelete', $for->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    @endsection


