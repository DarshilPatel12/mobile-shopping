@extends('admin.layout')

@section('title', 'Admin - Category')

@section('content')

@include('sweetalert::alert');

    <div class="buttons">
        <a href="{{ route('admin.category') }}" class="btn btn-primary active">Category</a>
        <a href="{{ route('admin.product') }}" class="btn">Product</a>
    </div>

    <div class="add">
        <a href="{{ route('admin.category.add') }}" class="btn btn-primary">Add Category</a>
    </div>

    <div class="container mt-4">
        @if ($category->isEmpty())
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
                    <th scope="col">Title</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>

                @foreach ($category as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td><a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a onclick="return confirm('Are you sure want to delete?')"
                                href="{{ url('admin/delete_category', $category->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforeach

            </table>
        </div>
        @endif
    </div>

@endsection
