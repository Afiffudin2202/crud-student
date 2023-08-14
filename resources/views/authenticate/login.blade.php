@extends('authenticate.layouts.main')
@section('content')
    @if (session('login'))
        <div class="alert alert-success">
            {{ session('login') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Please sign IN</h1>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password">
            <label for="password">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign Ip</button>
        <div class="mt-3 text-center">
            <a href="{{ url('register') }}">No have account ? Sign up</a>
        </div>

    </form>
@endsection
