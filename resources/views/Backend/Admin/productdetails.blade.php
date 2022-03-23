@extends('layouts.Admin.main')
@section('dashboard')
    <section id="content">


        <!-- MAIN -->
        <main>
            <form action="" class="p-4">
                <div class="row">
                    <div class="col-md-3">
                        {{-- <label for="product_name" class="form-label product-label">Product Name</label> --}}
                        <input type="search" class="form-control p-2" id="name" placeholder="Search Products"
                            name="search" />
                    </div>
                    <div class="col-md-3 pt-1">
                        <button class="btn btn-primary product-btn p-2">
                            Search &rarr;</button>
                    </div>
                </div>
            </form>
            <div class="col-sm-9">
                <h2 class=" text-danger">Total Product</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">ImageID</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->count() > 0)
                            @foreach ($products as $pro)
                                <tr>
                                    <th>{{ $pro->id }}</th>
                                    <td>{{ $pro->name }}</td>
                                    <td>{{ $pro->price }}</td>
                                    <td>{{ $pro->quantity }}</td>
                                    <td>{{ $pro->image }}</td>

                                    <td>
                                        <img src="{{ asset('uploads/products/' . $pro->image) }}" width="90px" height="70px"
                                            alt="Image">
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <h4><span class="text-success">Products Worth: </span>{{ $product_worth }}</h4> --}}
                        @else
                            <div class="text-danger">
                                No Products found!!
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>

        </main>
    </section>
@endsection
