@extends('user.dashboard.layouts.app')

@section('title', 'MUMS - User Dashboard')
@section('headerTitle', 'MUMS User Dashboard')

@section('content')
<section id="dashboard" class="mb-5 mt-5">
    <div class="row g-3">
        <!-- Total Submissions -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card text-center shadow card-custom">
                <div class="card-body">
                    <h5 class="card-title text-success">Total Submissions</h5>
                    <p class="display-6 fw-bold mt-2">{{ $totalSubmissions }}</p>
                </div>
            </div>
        </div>

        <!-- Approved Submissions -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card text-center shadow card-custom">
                <div class="card-body">
                    <h5 class="card-title text-primary">Approved</h5>
                    <p class="display-6 fw-bold mt-2">{{ $approvedSubmissions }}</p>
                </div>
            </div>
        </div>

        <!-- Pending Submissions -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card text-center shadow card-custom">
                <div class="card-body">
                    <h5 class="card-title text-warning">Pending</h5>
                    <p class="display-6 fw-bold mt-2">{{ $pendingSubmissions }}</p>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card text-center shadow card-custom">
                <div class="card-body">
                    <h5 class="card-title text-danger">Notifications</h5>
                    <p class="display-6 fw-bold mt-2">{{ $totalNotifications }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
.card-custom {
    min-height: 160px; /* Equal height cards */
    border-radius: 12px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #1c1c1e;
    color: #fff;
}
.card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}
.card-title {
    font-weight: 600;
}
</style>
@endsection
