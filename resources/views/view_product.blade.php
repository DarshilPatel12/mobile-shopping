<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <link rel="icon" href="{!! asset('img/icon.png') !!}"/>
    <title>View Product</title>

</head>

<body>
    <div class="view">
        <div class="close-btn">
            <a href="{{ url()->previous() }}">&#10006</a>
        </div>
        <div class="image">
            <img src="/images/{{ $product->image }}">
        </div>
        <div class="content">
            <h1>{{ $product->name }}</h1>
            <h3>Storage : </h3>
            <p>{{ $product->storage }}</p>
            <h3>Ram : </h3>
            <p>{{ $product->ram }}</p>
            <h3>Processor : </h3>
            <p>{{ $product->processor }}</p>
            <h3>Launch Date : </h3>
            <p>{{ $product->launch_date }}</p>
            <h3>Price : </h3>
            <p>₹ {{ $product->price }}</p>
        </div>
    </div>
</body>

</html>
