@extends('layouts.Admin.main')
@section('dashboard')
    <section id="content">


        <!-- MAIN -->
        <main>
            <form action="" class="p-4">
                <div class="row">
                    <div class="col-md-3">
                        {{-- <label for="product_name" class="form-label product-label">Product Name</label> --}}
                        <input type="date" class="form-control p-2" id="creared_at" placeholder="Search Products"
                            name="paymentSearch" />
                    </div>
                    <div class="col-md-3 pt-1">
                        <button class="btn btn-primary product-btn p-2">
                            Search &rarr;</button>
                    </div>
                </div>
            </form>
            <div class="col-sm-9">
                <h2 class=" text-danger">Payment History</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price </th>
                            <th scope="col">Category Name  </th>
                            <th scope="col">Payment Mode </th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($paymentSearch->count() > 0)
                            @foreach ($paymentSearch as $order)
                                <tr>
                                <th>{{$order->id}}</th>
                                <th>{{$order->user_id}}</th>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->manage_product_id}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->product_price}}</td>
                                <td>{{$order->category_name}}</td>
                                <td>{{$order->payment_mode}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->total }}</td>
                                <td>{{$order->created_at }}</td>

                                </tr>
                            @endforeach
                        @else
                            <div class="text-danger">
                                No Orders found!!
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>

        </main>
    </section>
@endsection
