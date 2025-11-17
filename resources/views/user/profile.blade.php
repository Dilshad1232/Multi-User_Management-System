@extends('user.dashboard.layouts.app')
@section('content')

<div class="container-fluid py-5">

    <div class="profile-container mx-auto shadow-lg rounded-4 overflow-hidden">

        <!-- Profile Sidebar -->
        <div class="profile-sidebar text-center">
            <div class="sidebar-photo mx-auto">
                <img src="{{ $user->profile_photo ? asset('profiles/' . $user->profile_photo) : asset('img/default-user.jpg') }}" alt="Profile Photo">
            </div>
            {{-- <img src="{{ $user->profile_photo ? asset('profiles/' . $user->profile_photo) : asset('img/default-user.jpg') }}" alt="Profile Photo"> --}}


            <div class="sidebar-name mt-3 text-uppercase">{{ $user->full_name }}</div>

            <!-- USER ID -->
            <div class="sidebar-userid text-warning fw-bold mt-1">
                User ID: [ {{ $user->user_id }}]
            </div>

            <div class="sidebar-role">Role : [ {{ $user->role ?? 'User' }} ]</div>

            <!-- SOCIAL LINKS -->
            <div class="social-links mt-3 d-flex justify-content-center gap-3">
                <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="https://wa.me/{{ $user->mobile_no }}" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:{{ $user->email }}" class="social-icon"><i class="fas fa-envelope"></i></a>
                <a href="https://t.me/username" target="_blank" class="social-icon"><i class="fab fa-telegram"></i></a>
            </div>

        </div>

        <!-- Profile Details -->
        <div class="profile-details">
            <h2 class="border-bottom border-secondary pb-2 mb-4 text-warning">Profile Information</h2>

            <div class="profile-info">
                <div><b>Father's Name:</b> {{ $user->father_name ?? 'N/A' }}</div>
                <div><b>Mobile No.:</b> {{ $user->mobile_no ?? 'N/A' }}</div>
                <div><b>Email:</b> {{ $user->email }}</div>
                <div><b>Address:</b> {{ $user->address ?? 'N/A' }}</div>
                <div><b>District:</b> {{ $user->district ?? 'N/A' }}</div>
                <div><b>Pin Code:</b> {{ $user->pin_code ?? 'N/A' }}</div>
            </div>

            <div class="buttons mt-4">
                <a href="{{ route('user.profile.edit') }}" class="edit-btn text-center text-decoration-none">Edit Profile</a>
                {{-- <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete your profile?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="edit-btn">Delete Profile</button>
                </form> --}}
            </div>
        </div>

    </div>

</div>

<style>
/* =============================== */
/* Same CSS as your version */
/* =============================== */
.profile-container {
    display: flex;
    flex-wrap: wrap;
    max-width: 950px;
    width: 100%;
    background: linear-gradient(145deg, #2d1b1b, #1b0f0f);
    border: 1px solid #3b2323;
}

/* Sidebar Section */
.profile-sidebar {
    flex: 0 0 280px;
    background: #5a1f1f;
    padding: 60px 20px;
    border-right: 2px solid #8b2b2b;
}

.sidebar-photo {
    width: 140px;
    height: 160px;
    border-radius: 10px;
    overflow: hidden;
    border: 2px solid #e84b3a;
    box-shadow: 0 8px 20px rgba(0,0,0,0.6);
}

.sidebar-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.sidebar-name {
    font-size: 22px;
    font-weight: 700;
    margin-top: 15px;
}

.sidebar-role {
    font-size: 14px;
    color: #f2b400;
}

/* Details Section */
.profile-details {
    flex: 1;
    padding: 40px 50px;
    color: #fff;
}

.profile-details h2 {
    font-size: 22px;
    color: #f2b400;
}

.profile-info {
    display: flex;
    flex-direction: column;
    gap: 15px;
    font-size: 15px;
    color: #fff;
}

.profile-info b {
    width: 150px;
    display: inline-block;
    font-weight: 600;
}

/* Buttons */
.buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 25px;
}

.edit-btn {
    flex: 1;
    padding: 12px 30px;
    background: #8b2b2b;
    color: #fff;
    font-weight: 700;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 5px 15px rgba(0,0,0,0.5);
}

.edit-btn:hover {
    background: #b03b3b;
    box-shadow: 0 8px 20px rgba(0,0,0,0.6);
}

/* Responsive Fixes */
@media (max-width: 992px) {
    .profile-container {
        flex-direction: column;
    }

    .profile-sidebar {
        width: 100%;
        border-right: none;
        border-bottom: 2px solid #8b2b2b;
        border-radius: 15px 15px 0 0;
        padding: 40px 20px;
    }

    .profile-details {
        padding: 25px 25px;
    }

    .profile-info b {
        width: 120px;
    }
}

.sidebar-userid {
    font-size: 14px;
    color: #f2b400;
    letter-spacing: 1px;
}

.social-links .social-icon {
    font-size: 20px;
    color: #ffd1c1;
    transition: .3s;
}

.social-links .social-icon:hover {
    color: #ffffff;
    transform: scale(1.2);
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@endsection
