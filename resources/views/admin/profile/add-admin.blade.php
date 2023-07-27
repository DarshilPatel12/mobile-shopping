@extends('admin.layout')

@section('title', 'Admin - Add Admin')

@section('content')

@include('sweetalert::alert');

<link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">


<div class="container mt-5">
    <h1 class="text-center">Add Admin</h1>

    <div class="cover">
        <form action="{{ url('admin/add_admin') }}" method="post">
            @csrf

            <div class="form-group mt-5">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username"
                    class="form-control mt-2" required>
            </div>

            <div class="form-group mt-5">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password"
                    class="form-control mt-2" required>
            </div>

            <div class="form-group mt-5">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirm Password"
                    class="form-control mt-2" required>
            </div>

            <div class="form-group text-center mt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</div>

@endsection
