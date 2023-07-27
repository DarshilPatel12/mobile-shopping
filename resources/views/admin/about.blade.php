@extends('admin.layout')

@section('title', 'Admin - About')

@section('content')

@include('sweetalert::alert');

    <div class="container">
        <div class="about_admin">
            <form action="{{ url('admin/edit_about', $about[0]->id) }}" method="post">
                @csrf

                <div class="form-group">
                    <textarea name="description" rows="10" class="form-control" required>
                    @foreach ($about as $about)
                        {{ $about->description }}
                    @endforeach
                </textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                </div>
            </form>
        </div>
    </div>

@endsection
