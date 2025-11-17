@extends('layouts.main')

@section('title', 'MUMS - Home')

@section('content')

<style>
    .hero {
  text-align: center;
  padding: 120px 20px 60px;
  position: relative;
  background: url('images/hero-bg1.jpg') no-repeat center center/cover; /* optional background image */
  color: #FFFFFF;
}

.hero h1 {
  font-size: 3rem;
  font-weight: 700;
  color: #00F0FF;
  margin-bottom: 20px;
}

.hero p {
  font-size: 1.2rem;
  color: #B0C4DE;
  margin-bottom: 30px;
}

.btn-hero {
  background: #00F0FF;
  color: #1B263B;
  font-weight: 600;
  padding: 0.7rem 2rem;
  border-radius: 50px;
  transition: all 0.3s ease;
  text-decoration: none;
}

.btn-hero:hover {
  background: #00C7D7;
  color: #FFFFFF;
  transform: scale(1.05);
}

</style>
    <!-- Hero Section -->
    <section class="hero">
        <h1>Multi-User Management System</h1>
        <p>Manage users, submissions, and notifications with a modern, secure, and premium interface.</p>
        <a href="#" class="btn btn-hero">Get Started</a>
    </section>

    <!-- Features Section -->
    <section class="features container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <h5>User Management</h5>
                    <p>Add, edit, and manage users easily with role-based access control and real-time logs.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <h5>Submissions Tracking</h5>
                    <p>Track, approve, or reject submissions with automated notifications and status updates.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <h5>Secure & Modern</h5>
                    <p>Built with secure API architecture, dark premium theme, and responsive design for all devices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta text-center py-5">
        <h2>Ready to Transform Your Workflow?</h2>
        <p>Start using MUMS today and experience seamless multi-user management in a modern premium interface.</p>
        <a href="#" class="btn btn-hero">Get Started Now</a>
    </section>
@endsection
