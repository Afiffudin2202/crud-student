@extends('authenticate.layouts.main')
@section('content')
    <form action="{{ url('register') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Please sign Up</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid
                
            @enderror"
                id="name" name="name">
            <label for="name">Name</label>
            @error('name')
                <div class="is-invalid">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email')
                is-invalid
            @enderror"
                id="email" name="email">
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password')
                is-invalid
            @enderror"
                id="password" name="password">
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign Up</button>
        <div class="mt-3 text-center">
            <a href="{{ url('login') }}">already have an account ? Sign in</a>
        </div>

    </form>
@endsection
