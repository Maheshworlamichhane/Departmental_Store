<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{url('Frontend/css/style.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>






  <title>My Website</title>
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar" >
        <div style="color: red">
           <h2><span>D</span>epartmental <span>S</span>tore</h2>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->roles === 'Admin')

                            @elseif(Auth::user()->roles === 'Staff')
                            <nav class="navbar navbar-expand-lg navbar-dark ">
                                <div class="container-fluid" style="color: red">
                                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                  </button>
                                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                      <li>
                                        <a href="{{route('userindex')}}" >Manage Users</a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{route('orderindex')}}" >Manage Orders</a>
                                    </li> --}}

                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                        document.getElementById('logout-form-a').submit();">Logout</a>
                                    </li>
                                    <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                  </div>
                                </div>
                              </nav>
                            @else
                                    {{-- <li><a href="#home" data-after="Home">Home</a></li>
                                    <li><a href="#products" data-after="Product">Products</a></li>
                                    <li><a href="#about" data-after="About">About</a></li>
                                    <li><a href="#contact" data-after="Contact">Contact</a></li> --}}
                                    <li>
                                      <a href="{{route('orderindex')}}" data-after="Buy Product" >Buy Products</a>
                                  </li>
                                  {{-- <li>
                                      <a href="#" class="#">Payment</a>
                                  </li> --}}
                                  <li>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-a').submit();">Logout</a>
                                </li>

                                <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                                    <li class="nav-item dropdown">
                                    {{-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a> --}}
                                    <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                                        {{-- <li>
                                            <a href="#" class="dropdown-item">Buy Products</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-item">Payment History</a>
                                        </li> --}}

                                        {{-- <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-a').submit();">Logout</a>
                                        </li>

                                        <form id="logout-form-a" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form> --}}
                                    </ul>
                                </li>

                            @endif
                    @else

                        @endauth
                    @endif
                </ul>

            </ul>
        </nav>
          </ul>
        </div>
      </div>
    </div>
</section>

</body>

