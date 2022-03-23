
    @extends('layouts.Admin.main')
    @section('dashboard')

    <div class="container mt-5 " id="container">
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add Category
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name">
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

            <div class="row">
                <div class="col-sm-9">

                <div class="col-sm-9 mt-5">
                <h2 class=" text-danger">Major Category</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cat)
                            <tr>
                                <th>{{$cat->id}}</th>
                                <td>{{$cat->name}}</td>
                                <td>
                                    <a href="{{ url('/categoriesedit', $cat->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/categoriesdelete', $cat->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

 @endsection
