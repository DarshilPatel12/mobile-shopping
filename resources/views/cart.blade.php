@auth

    @extends('layout')

    @section('title', 'Cart')

@section('content')

    @include('sweetalert::alert');


    <div class="container">
        @if ($cart->isEmpty())
        <div class="jumbotron jumbotron-fluid mt-5 text-center">
            <div class="container">
              <h1 class="display-4">Your Cart is Empty!</h1>
            </div>
        </div>
        @else
        <div class="cart-page">
            <table class="table table-striped">
                <tr class="table-info">
                    <th>Image</th>
                    <th>Title</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>

                <?php $totalprice = 0; ?>

                @foreach ($cart as $cart)
                    <tr>
                        <td><img src="images/{{ $cart->image }}" width="80" height="80"></td>
                        <td>
                            <p>{{ $cart->name }}</p>
                        </td>
                        <td>₹{{ $cart->price }}</td>
                        <td><a onclick="return confirm('Are you sure want to delete?')"
                                href="{{ url('/remove_to_cart', $cart->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>

                    <?php $totalprice = $totalprice + $cart->price; ?>
                @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td><h4>Total : ₹{{$totalprice}}</h4></td>
                        <td></td>
                    </tr>
            </table>
        </div>

        <div class="order text-center">
            <h3>Process to Order</h3>
            <div class="button">
                <a href="{{ url('/cash_order') }}" class="btn btn-primary">Cash On Delivery</a>
                <a href="{{ url('/stripe', $totalprice) }}" class="btn btn-primary">Pay Using Card</a>
            </div>
        </div>
        @endif

        <div class="orders">
            <a href="{{ url('/show_order') }}" class="btn btn-primary">Orders</a>
        </div>

    </div>

@endsection

@endauth
