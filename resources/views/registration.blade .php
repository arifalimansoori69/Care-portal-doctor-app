@extends('users.master')

@section('content')
<div class="container mt-5">
  <h2>Register</h2>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required class="form-control mb-2">

    <label>Email:</label>
    <input type="email" name="email" required class="form-control mb-2">

    <label>Password:</label>
    <input type="password" name="password" required class="form-control mb-2">

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required class="form-control mb-3">

    <button type="submit" class="btn btn-success">Register</button>
  </form>
  <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</div>
@endsection
