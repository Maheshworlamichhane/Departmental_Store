
@extends('Frontend.layouts.main')
@section('main_container')
  <section id="home">
    <div class="home container">
      <div>
        <h1>Hello, <span></span></h1>
        <h1>Welcome to  <span></span></h1>
        <h1>Departmental Store <span></span></h1>
    </div>
  </section>

  {{-- <section id="products">
    <div class="products container">
      <div class="product-top">
        <h1 class="section-title">P<span>roduct</span>s</h1>
      </div>


      <div class="row1"> --}}

        {{-- <div class="col3">
          <h2>Rice</h2>
          <img src="Frontend\img\img-11.jpg" alt="cate-1" height="300px" />
        </div> --}}
        {{-- @foreach ($products as $pro)
        <div class="col3">
            <img src="{{url("uploads/products")}}/{{ $pro->image}}" alt="p-1" />

            <h4>{{ $pro->name }}</h4>
            <p>Rs.{{ $pro->price }}</p>
            <p>Quantity:{{$pro->quantity}}</p>
          </div>
        @endforeach --}}
        {{-- <div class="col3">
          <h2>Millet</h2>
          <img src="Frontend\img\img-11.jpg" alt="cate-1" height="300px" />
        </div> --}}

      {{-- </div>

    </div>
  </section> --}}

   {{-- <section id="stocks">
    <div class="products container">
      <div class="product-top">
        <h1 class="section-title">St<span>o</span>ck</h1>
      </div> --}}


      {{-- <div class="row1"> --}}

        {{-- <div class="col3">
          <h2>Rice</h2>
          <img src="Frontend\img\img-11.jpg" alt="cate-1" height="300px" />
        </div> --}}
        {{-- @foreach ($stocks as $stock)
        <div class="col3">
            <img src="{{url("uploads/products")}}/{{ $stock->image}}" alt="p-1" />

            <h4>{{ $stock->name }}</h4>
            <p>Rs.{{ $stock->price }}</p>
            <h4 style="color:red;">Quantity:{{ $stock->quantity }}</h4>

          </div>
        @endforeach --}}
        {{-- <div class="col3">
          <h2>Millet</h2>
          <img src="Frontend\img\img-11.jpg" alt="cate-1" height="300px" />
        </div> --}}

      {{-- </div> --}}

    {{-- </div>
  </section> --}}


  <!-- About Section -->
  {{-- <section id="about">
    <div class="about container">
      <div class="col-left">
        @foreach ($forms as $for)
        <div class="about-img">
            <img src="{{url("uploads/products")}}/{{ $for->image}}" alt="p-1" /> --}}
          {{-- <img src="{{url('Frontend/img/img-2.png')}}" alt="img"> --}}
        {{-- </div>

      </div>
      <div class="col-right">
        <h1 class="section-title">Ab<span>o</span>ut</h1>
        <h2>{{ $for->name }}</h2>
        <p>{{ $for->description }}</p> --}}
        {{-- <h2>Departmental Store</h2>
        <p>A departmental store is a large retail trading organization. It has several departments, which are classified and organized accordingly. Departments are made as per different types of goods to be sold. For example, individual departments are established for selling packed food goods, groceries, garments, stationery, cutlery, cosmetics, medicines, computes, sports, furniture, etc., so that consumers can purchase all basic household requirements under one roof. It provides them maximum shopping convenience and therefore, also called as 'Universal Providers' or 'One spot shopping'. The concept of a departmental store first originated in France.</p> --}}
      {{-- </div>
      @endforeach
    </div>
  </section> --}}

  <!-- End About Section -->

  <!-- Contact Section -->
  {{-- <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>9818015927</h2>

          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>departmentalstore@gmail.com</h2>

          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>Kathmandu, Nepal</h2>
          </div>
        </div>
      </div>
    </div> --}}
  {{-- </section> --}}

  <!-- End Contact Section -->
@endsection
