@auth

    @extends('layout')

    @section('title', 'Cart')

@section('content')

    @include('sweetalert::alert');


    <div class="container">
        @if ($order->isEmpty())
            <div class="jumbotron jumbotron-fluid mt-5 text-center">
                <div class="container">
                    <h1 class="display-4">No Order Found!</h1>
                </div>
            </div>
        @else
            <div class="cart-page">
                <table class="table table-striped">
                    <tr class="table-info">
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Cancle Order</th>
                    </tr>

                    @foreach ($order as $order)
                        <tr>
                            <td><img src="images/{{ $order->image }}" width="80" height="80"></td>
                            <td>
                                <p>{{ $order->name }}</p>
                            </td>
                            <td>₹{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                @if ($order->delivery_status == 'Processing...')
                                    <a onclick="return confirm('Are you sure want to cancle order?')"
                                        href="{{ url('/cancle_order', $order->id) }}" class="btn btn-danger">Cancle
                                        Order</a>
                                @else
                                    <p>Not Allowed</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif


    </div>

@endsection

@endauth
