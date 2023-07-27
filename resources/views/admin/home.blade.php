@extends('admin.layout')

@section('title', 'Admin - Home')

@section('content')

    @include('sweetalert::alert');

    <div class="first">
        <div class="row">
            <div class="col-2">
                <form action="{{ url('admin/edit_image', $home[0]->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <img src="/img/{{ $home[0]->image }}">
                    <input type="file" name="image">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="about" id="about">
        <h2 class="text-center">MOBILE.COM</h2>
        <div class="about_admin">
        <form action="{{ url('admin/edit_about_home', $home[1]->id) }}" method="post">
            @csrf

            <div class="form-group">
                <textarea name="description" cols="148" rows="10" required>
                    {{ $home[1]->description }}
                </textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
            </div>
        </form>
    </div>

    </div>

    <!-- imageslider -->
    <div class="container">
        <div class="image-slider">
            <form action="{{ url('admin/edit_image', $home[2]->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <img src="/img/{{ $home[2]->image }}" class="d-block w-100" style="height: 370px;">
                <input type="file" name="image">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
            </form>
        </div>

        <div class="image-slider">
            <form action="{{ url('admin/edit_image', $home[3]->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <img src="/img/{{ $home[3]->image }}" class="d-block w-100" style="height: 370px;">
                <input type="file" name="image">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
            </form>
        </div>

        <div class="image-slider">
            <form action="{{ url('admin/edit_image', $home[4]->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <img src="/img/{{ $home[4]->image }}" class="d-block w-100" style="height: 370px;">
                <input type="file" name="image">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
            </form>
        </div>

    </div>
    <!-- imageslider -->

@endsection
