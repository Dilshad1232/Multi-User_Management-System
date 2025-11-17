@extends('layouts.main')

@section('title', 'Login')

@section('content')
<style>
    body {
        background: radial-gradient(circle at top left, #240909, #0c0c0c) !important;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
        margin-bottom: -40px;
        margin-top: -80px;
    }

    .login-box {
        background: rgba(40, 10, 10, 0.85);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 100, 100, 0.2);
        border-radius: 20px;
        box-shadow: 0 0 25px rgba(255, 0, 0, 0.2);
        width: 90%;
        max-width: 480px;
        padding: 35px 40px;
    }

    h2 {
        font-weight: 700;
        color: #f2b400;
        text-transform: uppercase;
        font-size: 24px;
        text-align: center;
    }

    p {
        color: #ccc;
        font-size: 14px;
        text-align: center;
    }

    .form-control {
        background: rgba(25, 10, 10, 0.8);
        border: 1px solid rgba(232, 75, 58, 0.4);
        color: #fff;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 14px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #e84b3a;
        box-shadow: 0 0 8px rgba(232, 75, 58, 0.6);
        background: rgba(45, 15, 15, 0.9);
    }

    .login-btn {
        background: linear-gradient(135deg, #b03b3b, #8b2b2b);
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 8px;
        padding: 12px 20px;
        width: 100%;
        font-size: 15px;
        transition: 0.3s;
    }

    .login-btn:hover {
        background: linear-gradient(135deg, #c04d4d, #a32e2e);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.4);
    }

    .text-small {
        font-size: 14px;
        text-align: center;
    }

    @media (max-width: 992px) {
        .login-box {
            padding: 25px;
            width: 95%;
        }
    }
</style>

<div class="login-wrapper ">
    <div class="login-box mt-5 ">
        <h2>Login</h2>
        <p>Access your account</p>

        <!-- Error -->
        @if($errors->any())
            <div class="bg-danger bg-opacity-25 text-danger border border-danger p-2 rounded mb-3 small">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="mt-3">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <p class="text-small mt-3">
            Don't have an account?
            <a href="{{ url('/register') }}" class="text-warning text-decoration-none fw-bold">Register</a>
        </p>
    </div>
</div>

@endsection
