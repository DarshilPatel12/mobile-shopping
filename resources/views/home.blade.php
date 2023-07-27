@extends('layout')

@section('title', 'Home')

@section('content')

@include('sweetalert::alert');

    <div class="first">
        <div class="row">
            <div class="col-2">
                <h1>Your Dream Phone<br>Is Here!</h1>
                <p>The future of mobile is the future of online. It is <br> how people access online content now.</p>
                <a href="#about" class="btn btn-primary">Explore Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src="img/{{$home[0]->image}}">
            </div>
        </div>
    </div>

    <div class="about" id="about">
        <h2 class="text-center">MOBILE.COM</h2>
        <p>{{$home[1]->description}}</p>
    </div>

    <!-- imageslider -->
    <div class="container imageslider">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/{{$home[2]->image}}" class="d-block w-100" style="height: 370px;">
                </div>
                <div class="carousel-item">
                    <img src="img/{{$home[3]->image}}" class="d-block w-100" style="height: 370px;">
                </div>
                <div class="carousel-item">
                    <img src="img/{{$home[4]->image}}" class="d-block w-100" style="height: 370px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev" style="opacity:0;cursor:pointer;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden" class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next" style="opacity:0;cursor:pointer;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- imageslider -->



    <!-- products -->
    <div class="products">
        <h2 class="text-center">PRODUCTS</h2>
        <div class="row" style="margin-left: 15%;">
            @foreach ($product as $product)
                <div class="col-3">
                    <img src="images/{{ $product->image }}" width="350" height="150"
                        style="margin-top:5px;margin-left:7px;">
                    <h4 style="margin-top:5px;">{{ $product->name }}</h4>
                    <p><strong>Storage : </strong>{{ $product->storage }}<br><strong>Ram : </strong>{{ $product->ram }}<br><strong>Processor : </strong>{{ $product->processor }}</p>
                    <p style="font-size:25px;">₹{{ $product->price }}</p>
                    @auth
                        <a href="{{ url('/add_to_cart', $product->id ) }}" class="btn btn-info" name="addToCart">Add to Cart</a> 
                    @else
                        <a class="btn btn-info disabled">Add to Cart</a> 
                    @endauth
                    <a href="{{ url('/view_product', $product->id) }}" class="ml-5"><i class="fa-solid fa-eye"></i></a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- products -->


@endsection
