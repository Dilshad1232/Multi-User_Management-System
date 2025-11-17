@extends('layouts.main')

@section('title', 'MUMS | User Registration')

@section('content')
<section class="d-flex justify-content-center align-items-center py-5" style="min-height:100vh; background: radial-gradient(circle at top left, #240909, #0c0c0c);">
    <div class="register-box shadow-lg mt- mb-5">
        <div class="text-center mb-3">
            @if(session('success'))
<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif

            <h2>User Registration</h2>
            <p>Create your account and join MUMS Portal</p>
        </div>

        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">

                <div class="col-md-4">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}">
                    @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                    <label>Father's Name</label>
                    <input type="text" name="father_name" class="form-control" value="{{ old('father_name') }}">
                    @error('father_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                    <label>Mobile No.</label>
                    <input type="text" name="mobile_no" class="form-control" value="{{ old('mobile_no') }}">
                    @error('mobile_no') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmationj" class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                    <label>District</label>
                    <input type="text" name="district" class="form-control" value="{{ old('district') }}">
                    @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4">
                    <label>Pin Code</label>
                    <input type="text" name="pin_code" class="form-control" value="{{ old('pin_code') }}">
                    @error('pin_code') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6">
                    <label>Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control">
                    @error('profile_photo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 d-flex align-items-end justify-content-end">
                    <button type="submit" class="register-btn">Register Now</button>
                </div>

            </div>
        </form>


        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-warning text-decoration-none text-small">Already have an account? Login</a>
        </div>
    </div>
</section>

<style>
.register-box {
    background: rgba(40, 10, 10, 0.85);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 100, 100, 0.2);
    border-radius: 20px;
    box-shadow: 0 0 25px rgba(255, 0, 0, 0.2);
    width: 90%;
    max-width: 950px;
    padding: 35px 45px;
    color: #fff;
}

h2 {
    font-weight: 700;
    color: #f2b400;
    text-transform: uppercase;
    font-size: 24px;
}

p {
    color: #ccc;
    font-size: 14px;
}

.form-control {
    background: rgba(25, 10, 10, 0.8);
    border: 1px solid rgba(232, 75, 58, 0.4);
    color: #fff;
    border-radius: 8px;
    padding: 8px 10px;
    font-size: 14px;
    transition: 0.3s;
}

.form-control:focus {
    border-color: #e84b3a;
    box-shadow: 0 0 8px rgba(232, 75, 58, 0.6);
    background: rgba(45, 15, 15, 0.9);
}

.register-btn {
    background: linear-gradient(135deg, #b03b3b, #8b2b2b);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 8px;
    padding: 10px 25px;
    transition: 0.3s;
}

.register-btn:hover {
    background: linear-gradient(135deg, #c04d4d, #a32e2e);
    box-shadow: 0 5px 15px rgba(255, 0, 0, 0.4);
}

label {
    font-weight: 500;
    font-size: 13px;
    color: #ffdf91;
}

.text-small {
    font-size: 13px;
}

@media (max-width: 992px) {
    .register-box {
        padding: 25px;
        width: 95%;
    }
    section {
        min-height: auto;
        padding: 60px 0;
    }
}
</style>
@endsection
