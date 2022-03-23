
 @extends('layouts.Admin.main')
@section('dashboard')
    <div class="container mt-3" id="container"  >
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Adding Staffs

              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Adding Staffs</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="mb-3 ">
                                <label for="name" class="form-label">Name</label>
                                <input type="name" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div>
                                <button type="submit" class="btn btn-danger">Submit</button>
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
            <div class="row" >

                <div class="col-sm-12">
                    <h2 class="text-danger mt-3">Total Staffs</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $ur)
                            <tr>
                                <th>{{$ur->id}}</th>
                                <td>{{$ur->name}}</td>
                                <td>{{$ur->email}}</td>
                                <td>{{$ur->password}}</td>
                                <td>{{$ur->roles}}</td>
                                <td>
                                    <a href="{{ url('/edit', $ur->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/delete', $ur->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

@endsection


