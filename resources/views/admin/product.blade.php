@extends('admin.layout')

@section('title', 'Admin - Product')

@section('content')

@include('sweetalert::alert');

    <div class="buttons">
        <a href="{{ route('admin.category') }}" class="btn">Category</a>
        <a href="{{ route('admin.product') }}" class="btn btn-primary active">Product</a>
    </div>

    <div class="add">
        <a href="{{ route('admin.product.add') }}" class="btn btn-primary">Add Product</a>
    </div>

    <div class="container mt-4">

        @if ($products->isEmpty())
        <div class="jumbotron jumbotron-fluid mt-5 text-center">
            <div class="container">
              <h1 class="display-4">No Record Found!</h1>
            </div>
        </div>
        @else
        <div class="tables">
            <table cellspacing="1" class="table table-striped table-hover">
                <tr class="table-info" width="100vh">
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Other Details</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td><img src="/images/{{ $product->image }}" height="80px" width="80px"></td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <strong>Storage : </strong>{{ $product->storage }} <br>
                            <strong>Ram : </strong>{{ $product->ram }} <br>
                            <strong>Processor : </strong>{{ $product->processor }} <br>
                            <strong>Launch Date : </strong>{{ $product->launch_date }}
                        </td>
                        <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary"><i
                                    class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a onclick="return confirm('Are you sure want to delete?')"
                                href="{{ url('admin/delete_product', $product->id) }}" class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforeach

            </table>

            <div class="pagination text-center">{{$products->links()}}</div>
        </div>
        @endif

    </div>

@endsection
