@extends('admin.layout')

@section('title', 'Admin - Product')

@section('content')

@include('sweetalert::alert');

    <div class="container mt-4">

        @if ($order->isEmpty())
        <div class="jumbotron jumbotron-fluid mt-5 text-center">
            <div class="container">
              <h1 class="display-4">No Record Found!</h1>
            </div>
        </div>
        @else
        <table cellspacing="1" class="table table-striped table-hover">
            <tr class="table-info" width="100vh">
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Delivered</th>
            </tr>

            @foreach ($order as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->email }}</td>
                    <td><img src="/images/{{ $order->image }}" height="80px" width="80px"></td>
                    <td>{{ $order->name }}</td>
                    <td>₹{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td>
                        @if ($order->delivery_status == 'Processing...')
                            <a onclick="return confirm('Are you sure this product is delivered?')" href="{{ url('admin/delivered', $order->id) }}" class="btn btn-primary">Delivered</a>
                        @else
                            <p>Delivered</p>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
        @endif

    </div>

@endsection
