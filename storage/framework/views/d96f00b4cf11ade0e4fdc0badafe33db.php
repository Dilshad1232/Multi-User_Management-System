<?php $__env->startSection('title', 'MUMS - Home'); ?>

<?php $__env->startSection('content'); ?>

<!-- AOS CSS & JS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- ================= Hero Section ================= -->
<section class="text-white text-center d-flex align-items-center justify-content-center"
         style="height: 100vh; background: url('https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940') center/cover no-repeat;">
    <div class="container" data-aos="fade-up">
        <h1 class="display-4 fw-bold mb-3 text-shadow-lg">Multi-User Management System</h1>
        <p class="lead mb-4 text-shadow-md">Manage users, submissions, and notifications with a secure and modern interface.</p>
        <a href="#" class="btn btn-light btn-lg rounded-pill shadow-lg hover-scale">Get Started</a>
    </div>
</section>

<!-- ================= Features Section ================= -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold" data-aos="fade-up">Features</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card p-4 h-100 shadow-lg rounded-4 hover-scale" style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);">
                    <img src="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=150&w=150" class="mb-3 rounded-circle mx-auto d-block" width="100" alt="User Management">
                    <h5 class="fw-bold mb-2 text-white text-center">User Management</h5>
                    <p class="text-white text-center">Role-based access, profile management, and activity logs made easy.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card p-4 h-100 shadow-lg rounded-4 hover-scale" style="background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);">
                    <img src="https://images.pexels.com/photos/3184295/pexels-photo-3184295.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=150&w=150" class="mb-3 rounded-circle mx-auto d-block" width="100" alt="Submission Tracking">
                    <h5 class="fw-bold mb-2 text-white text-center">Submission Tracking</h5>
                    <p class="text-white text-center">Track, approve, or reject submissions with automated notifications.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card p-4 h-100 shadow-lg rounded-4 hover-scale" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=150&w=150" class="mb-3 rounded-circle mx-auto d-block" width="100" alt="Secure & Modern">
                    <h5 class="fw-bold mb-2 text-white text-center">Secure & Modern</h5>
                    <p class="text-white text-center">Secure architecture with a clean, responsive, and modern UI.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= Workflow Section ================= -->
<section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="mb-5 fw-bold" data-aos="fade-up">How It Works</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                <div class="card p-4 h-100 shadow-lg rounded-4 hover-scale" style="background: #ffd6d6;">
                    <i class="fa-solid fa-user-plus fa-3x mb-3 text-primary"></i>
                    <h5 class="fw-bold mb-2">Register</h5>
                    <p>Create a secure user profile quickly.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card p-4 h-100 shadow-lg rounded-4 hover-scale" style="background: #d6f5d6;">
                    <i class="fa-solid fa-file-circle-check fa-3x mb-3 text-success"></i>
                    <h5 class="fw-bold mb-2">Submit & Track</h5>
                    <p>Submit requests and track them in real-time.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-left" data-aos-delay="300">
                <div class="card p-4 h-100 shadow-lg rounded-4 hover-scale" style="background: #d6e0ff;">
                    <i class="fa-solid fa-gear fa-3x mb-3 text-primary"></i>
                    <h5 class="fw-bold mb-2">Admin Approval</h5>
                    <p>Admins manage approvals and rejections efficiently.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= Statistics Section ================= -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-3 mb-3" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="fw-bold">1200+</h3>
                <p>Users</p>
            </div>
            <div class="col-md-3 mb-3" data-aos="zoom-in" data-aos-delay="200">
                <h3 class="fw-bold">500+</h3>
                <p>Submissions</p>
            </div>
            <div class="col-md-3 mb-3" data-aos="zoom-in" data-aos-delay="300">
                <h3 class="fw-bold">99%</h3>
                <p>Uptime</p>
            </div>
            <div class="col-md-3 mb-3" data-aos="zoom-in" data-aos-delay="400">
                <h3 class="fw-bold">10+</h3>
                <p>Modules</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= Submission Cards ================= -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-5 fw-bold" data-aos="fade-up">Submission Preview</h2>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                <div class="card border-0 shadow-lg p-4 hover-scale" style="background: linear-gradient(135deg,#ffd6e0,#ffe0d6);">
                    <h5 class="fw-bold mb-2">Track Your Submission</h5>
                    <p>Real-time status updates for every submission.</p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                <div class="card border-0 shadow-lg p-4 hover-scale" style="background: linear-gradient(135deg,#d6e0ff,#d6f0ff);">
                    <h5 class="fw-bold mb-2">Admin Workflow</h5>
                    <p>Admins manage approvals & rejections transparently.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= Testimonials ================= -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="mb-5 fw-bold" data-aos="fade-up">Testimonials</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
                <div class="card border-0 shadow-lg p-4 hover-scale" style="background: #fff0d6;">
                    <p>"MUMS simplified our user management process!"</p>
                    <h6 class="fw-bold mt-3">Alice Brown</h6>
                    <small>Business Manager</small>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
                <div class="card border-0 shadow-lg p-4 hover-scale" style="background: #d6f0ff;">
                    <p>"Submission tracking is smooth and reliable."</p>
                    <h6 class="fw-bold mt-3">Bob Johnson</h6>
                    <small>Team Lead</small>
                </div>
            </div>
            <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
                <div class="card border-0 shadow-lg p-4 hover-scale" style="background: #ffd6d6;">
                    <p>"Secure, modern UI – perfect for our organization."</p>
                    <h6 class="fw-bold mt-3">Cathy Zhang</h6>
                    <small>Admin</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= Call to Action ================= -->
<section class="py-5 bg-primary text-white text-center" data-aos="fade-up">
    <div class="container">
        <h2 class="mb-3 fw-bold">Start Using MUMS Today</h2>
        <p class="mb-4">Manage users, submissions, and notifications securely.</p>
        <a href="#" class="btn btn-light btn-lg rounded-pill shadow-lg hover-scale">Get Started Now</a>
    </div>
</section>

<!-- ================= Hover Animation ================= -->
<style>
.hover-scale:hover {
    transform: scale(1.05);
    transition: transform 0.3s;
}
.text-shadow-lg {
    text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
}
.text-shadow-md {
    text-shadow: 1px 1px 6px rgba(0,0,0,0.5);
}
</style>

<script>
  AOS.init({ once: true, duration: 1000 });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel all\myapp\resources\views/index.blade.php ENDPATH**/ ?>