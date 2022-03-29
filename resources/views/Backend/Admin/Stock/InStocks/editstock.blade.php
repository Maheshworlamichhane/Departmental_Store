<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Edit Stock</title>
</head>
<body>
    <div class="pl-3">
        <a href="{{route('instockindex')}}">
            <div class="pt-2 pb-2">
                <button class="px-4 py-2 text-sm font-medium leading-5 text-light btn btn-danger">
                    Back
                </button>
            </div>
         </a>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="name" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $stock->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="quantity" class="form-control" id="quantity" name="quantity" value="{{ $stock->quantity }}">
                      </div>
                      <div class="mb-3">
                        <label for="supplier" class="form-label">Suppplier</label>
                        <input type="supplier" class="form-control" id="supplier" name="supplier" value="{{ $stock->supplier }}">
                      </div>

                    <button type="submit" class="btn btn-danger">Update</button>
                  </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</body>
</html>
