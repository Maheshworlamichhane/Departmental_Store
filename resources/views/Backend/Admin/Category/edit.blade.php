<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title class="text-white bg-dark">Edit Product</title>
</head>
<body>
    <div class="pl-3">
        <a href="{{route('categoriescreate')}}">
            <div class="pt-2 pb-2">
                <button class="px-4 py-2 text-sm font-medium leading-5 text-light btn btn-danger">
                    Back
                </button>
            </div>
         </a>
    <div class="container mt-5 ml-3">
        <h2 class=" text-danger">Updating Product Category Page</h2>

            <div class="row">
                <div class="col-sm-9">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" id="name" name="name" value="{{ $category->name }}">
                        </div>
                        <button type="submit" class="btn btn-danger">Add Major Supply</button><br><br>
                        <div>
                            <a class="alert-danger">
                                @error('name'){{$message}}

                                @enderror

                            </a>
                        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
</html>
