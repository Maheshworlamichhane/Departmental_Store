@extends('layouts.Admin.main')
@section('dashboard')
<section id="content">


    <!-- MAIN -->
    <main>
        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
                    <div class="card-content">
                        <p class="category"><strong>Total Orders</strong></p>
                        <h3 class="card-title">{{ $total_orders }}</h3>
                    </div>
                </span>
            </li>
            <li>
                <i class='bx bxs-group' ></i>
                <span class="text">
                    <p class="category"><strong>Total Users</strong></p>
                    <h3 class="card-title">{{ $total_users }}</h3>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">
                    <p class="category"><strong>Total Product</strong></p>
                    <h3 class="card-title">{{ $total_products }}</h3>
                </span>
            </li>
        </ul>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>

                </div>
                <table class="table table-hover">
                    <thead class="text-primary">
                        <tr>
                            <th> Order ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Category Name </th>
                            <th>Quantity </th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->manage_product_id }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->product_price }}</td>
                            <td>{{ $order->category_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </main>
</section>
@endsection
