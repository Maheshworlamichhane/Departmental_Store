<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style1.css">

	<title>Admin</title>
    <style>
        #container{
            padding-left:15%;
        }
        #logout{
            padding-left:90%;
            font-size: 18px;
        }
    </style>
</head>
<body>
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{('/admindashboard')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

            <li class="active">
				<a href="{{('/productdetails')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Product Details</span>
				</a>
			</li>
            <li class="active">
				<a href="{{('/instockdetails')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">InStock Details</span>
				</a>
			</li>
            <li class="active">
				<a href="{{('/totalstockdetails')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Total Stock Details</span>
				</a>
			</li>
            <li class="active">
				<a href="{{('/paymentdetails')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Payment Details</span>
				</a>
			</li>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    {{-- <li class="active">
                        <a href="{{route('formindex')}}" >
					<span class="text">About</span>
                    </a>
                    </li> --}}
                    <li class="active"><a  href="{{route('iindex')}}"  >
					<span class="text">Manage Staff</span>

                    </a>
                    </li>

                    {{-- <li>
                        <a href="{{route('orderindex')}}" >Manage Orders</a>
                    </li> --}}

                    <li class="active">
                        <a href="{{route('productindex')}}" >
					    <span class="text">Manage Products</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('categoriesindex')}}" >
					    <span class="text">Category</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('instockindex')}}" >
                            <span class="text">In Stock</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{route('totalstockindex')}}" >
                            <span class="text">Total Stock</span>
                        </a>
                    </li>
                    <li class="active">

                                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                document.getElementById('logout-form-a').submit();">Logout</a>
                            </li>
                            <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </a>
                </ul>
            </ul>

	</section>

	<section id="content">
		<nav>
            <div>
			<i class='bx bx-menu' ></i>

            </div>
            {{-- <div id="logout" >
            <li>
                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form-a').submit();">Logout</a>
            </li>
            <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
            </div> --}}
		</nav>
	</section>
    @yield ('dashboard')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
	<script src="js/script.js"></script>
</body>
</html>

