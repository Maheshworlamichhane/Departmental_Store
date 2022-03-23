@extends('layouts.Admin.main')
@section('dashboard')
    <section id="content">


        <!-- MAIN -->
        <main>
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
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->count() > 0)
                            @foreach ($orders as $order)
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
