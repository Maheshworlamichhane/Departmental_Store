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
    <div class="container mt-5" id="container"  >
        <h2 class=" text-danger ">Adding Staffs</h2>
            <div class="row" >
                <div class="col-sm-12 ">
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

                <div class="col-sm-12">
                    <h2 class=" text-danger">Total Staffs</h2>
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

@endsection --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
</html> --}}

