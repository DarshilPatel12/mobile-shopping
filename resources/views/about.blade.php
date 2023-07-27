@extends('layout')

@section('title', 'About')

@section('content')

    <div class="about">
        <h2>ABOUT US</h2>

        @foreach ($about as $about)
            <p>{{ $about->description }}</p>
        @endforeach

    </div>

@endsection
