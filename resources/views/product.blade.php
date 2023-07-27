@extends('layout')

@section('title', 'Product')

@section('content')

    @include('sweetalert::alert');

    <div class="container">
        <div class="select-company">

            <form action="{{ url('/select_category') }}" method="get">
                <h2>Select Category : </h2>
                <select name="category" id="category" class="form-control">
                    <option value="0">Select Category</option>
                    @foreach ($category as $category)
                        @if ($select_category == $category->id)
                            <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

        </div>
    </div>


    <div class="products">
        <div class="row" style="margin-left: 15%;">
            @foreach ($product as $product)
                <div class="col-3">
                    <img src="images/{{ $product->image }}" width="350" height="150"
                        style="margin-top:5px;margin-left:7px;">
                    <h4 style="margin-top:5px;">{{ $product->name }}</h4>
                    <p><strong>Storage : </strong>{{ $product->storage }}<br><strong>Ram :
                        </strong>{{ $product->ram }}<br><strong>Processor : </strong>{{ $product->processor }}</p>
                    <p style="font-size:25px;">₹{{ $product->price }}</p>
                    @auth
                        <a href="{{ url('/add_to_cart', $product->id) }}" class="btn btn-info" name="addToCart">Add to Cart</a>
                    @else
                        <a class="btn btn-info disabled" name="addToCart">Add to Cart</a>
                    @endauth
                    <a href="{{ url('/view_product', $product->id) }}" class="show-btn ml-5"><i
                            class="fa-solid fa-eye"></i></a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
