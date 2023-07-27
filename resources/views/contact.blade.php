@extends('layout')

@section('title', 'Contact')

@section('content')

@include('sweetalert::alert');

    <form action="{{ url('/add_contact') }}" method="post" class="contact mt-5">
        <h3 class="text-center">Contact Us</h3>

        @csrf

        <label for="Email">Email</label>
        <input type="email" placeholder="Email" name="email" required>

        <label for="number">Phone Number</label>
        <input type="tel" placeholder="Phone" minlength="10" maxlength="10" name="phone" required>

        <label for="textarea">Message</label>
        <textarea placeholder="Message" name="message" required></textarea>

        <button class="mt-5" type="submit">Submit</button>
    </form>

@endsection
