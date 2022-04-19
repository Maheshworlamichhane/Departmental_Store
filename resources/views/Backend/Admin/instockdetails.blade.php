@extends('layouts.Admin.main')
@section('dashboard')
    <section id="content">


        <!-- MAIN -->
        <main>
            <form action="" class="p-4">
                <div class="row">
                    <div class="col-md-3">
                        {{-- <label for="product_name" class="form-label product-label">Product Name</label> --}}
                        <input type="name" class="form-control p-2" id="name" placeholder="Products"
                            name="instocksearch" />
                    </div>
                    <div class="col-md-3 pt-1">
                        <button class="btn btn-primary product-btn p-2">
                            Search &rarr;</button>
                    </div>
                </div>
            </form>

            {{-- <div class="col-sm-9">
                <h2 class=" text-danger">In Stocks History</h2>

                <table class="table table-hover"> --}}
                    <div class="col-sm-9 badge bg-light">
                        <h2 class=" text-danger">In stock history</h2>
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
                        @if ($stocks->count() > 0)
                            @foreach ($stocks as $in)
                                <tr>
                                    <th>{{$in->id}}</th>
                                    <td>{{$in->name}}</td>
                                    <td>{{$in->quantity}}</td>
                                    <td>{{$in->supplier}}</td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-danger">
                                No Stocks found!!
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>

        </main>
    </section>
@endsection
