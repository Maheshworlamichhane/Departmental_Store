@extends('layouts.Admin.main')
@section('dashboard')
    <section id="content">


        <!-- MAIN -->
        <main>
            <div class="col-sm-9">
                <h2 class=" text-danger">Total Stocks</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($stocks->count() > 0)
                            @foreach ($stocks as $to)
                                <tr>
                                    <th>{{$to->id}}</th>
                                    <td>{{$to->name}}</td>
                                    <td>{{$to->quantity}}</td>
                                    <td>{{$to->price}}</td>
                                    <td>{{$to->category}}</td>
                                    <td>{{$to->supplier}}</td>
                                    <td>{{$to->total}}</td>
                                    <td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-danger">
                                No Totalstock found!!
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>

        </main>
    </section>
@endsection
