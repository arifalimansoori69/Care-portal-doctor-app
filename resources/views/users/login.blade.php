@extends('users.master')

@section('content')
<section class="hero">
  <h1>Login</h1>
  <p class="muted">Administrator, Doctor, or Patient</p>
</section>

<div class="card">
  <div class="muted" style="margin-bottom:10px">
    Use the Laravel authentication to sign in securely.
  </div>
  <div style="display:grid;gap:10px;max-width:420px">
    <a class="button" href="{{ route('login') }}">Go to Login</a>
    <p class="muted">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
  </div>
</div>
@endsection
