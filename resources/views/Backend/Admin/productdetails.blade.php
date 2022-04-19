@extends('layouts.Admin.main')
@section('dashboard')
    <section id="content">


        <!-- MAIN -->
        <main>
            <form action="" class="p-4">
                <div class="row">
                    <div class="col-md-3">
                        {{-- <label for="product_name" class="form-label product-label">Product Name</label> --}}
                        <input type="name" class="form-control p-2" id="name" placeholder="Search Products"
                            name="productSearch" />
                    </div>
                    <div class="col-md-3 pt-1">
                        <button class="btn btn-primary product-btn p-2">
                            Search &rarr;</button>
                    </div>
                </div>
            </form>



            <div class="col-sm-9 badge bg-light">
                <h2 class=" text-danger">Total Product</h2>
                <table class="table table-hover">
            {{-- <div class="col-sm-9">
                <h2 class=" text-danger">Total Product</h2>

                <table class="table table-hover"> --}}
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category </th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Qr Code</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($products->count() > 0)
                            @foreach ($products as $pro)
                                <tr>
                                    <td>
                                        {{$pro->name}}
                                    </td>

                                    <td>
                                        <img src="{{ asset('uploads/products/' . $pro->image) }}" width="90px" height="70px"
                                            alt="Image">
                                    </td>
                                    <td>
                                        {{$pro->category_name}}
                                    </td>

                                    <td>
                                        {{$pro->price}}
                                    </td>
                                    <td>
                                        {{$pro->quantity}}
                                    </td>
                                    <td>
                                        {{$pro->total}}
                                    </td>
                                    <td>
                                        <div class="qrcode">
                                            {!! QrCode::size(100)->generate(
                                            "Category:$pro->category_name,
                                            Product Name:$pro->name,
                                             Product Price:$pro->price,
                                             Product Quantity:$pro->quantity,
                                             1 Total:$pro->total"
                                            ); !!}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                                <h1 class="text-danger">No Products Found!!</h1>
                        @endif
                            {{-- <h4><span class="text-success">Products Worth: </span>{{ $product_worth }}</h4> --}}

                    </tbody>
                </table>

            </div>

        </main>
    </section>
@endsection
