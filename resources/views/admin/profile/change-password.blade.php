@extends('admin.layout')

@section('title', 'Admin - Change Password')

@section('content')

    @include('sweetalert::alert');

    <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">


    <div class="container mt-5">
        <h1 class="text-center">Change Password</h1>

        <div class="cover">
            <form action="{{ url('admin/change_password') }}" method="post">
                @csrf

                <div class="form-group mt-5">
                    <label for="currentPassword">Current Password</label>
                    <input type="text" name="currentPassword" id="currentPassword" placeholder="Enter Current Password"
                        class="form-control mt-2" required>
                    @if (session()->has('currentPass_error'))
                        <p class="text-danger ml-2">{{ session()->get('currentPass_error') }}</p>
                    @endif
                </div>

                <div class="form-group mt-5">
                    <label for="newPassword">New Password</label>
                    <input type="password" name="newPassword" id="newPassword" placeholder="Enter New Password"
                        class="form-control mt-2" required>
                    @if (session()->has('newPass_error'))
                        <p class="text-danger ml-2">{{ session()->get('newPass_error') }}</p>
                    @endif
                </div>

                <div class="form-group mt-5">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter Confirm Password" class="form-control mt-2" required>
                    @if (session()->has('confirmPass_error'))
                        <p class="text-danger ml-2">{{ session()->get('confirmPass_error') }}</p>
                    @endif
                </div>

                <div class="form-group text-center mt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>

@endsection
