<?php $__env->startSection('title', 'About Us - MUMS'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section with parallax effect -->
<div class="hero-section position-relative text-center text-white d-flex align-items-center" style="height: 70vh; background: url('https://images.unsplash.com/photo-1581090700227-6a84c132f927?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1400') no-repeat center center; background-size: cover;">
    <div class="overlay position-absolute w-100 h-100" style="background: rgba(0,0,0,0.6);"></div>
    <div class="position-relative w-100" data-aos="fade-down" data-aos-duration="1500">
        <h1 class="display-3 fw-bold animate__animated animate__fadeInDown">Welcome to MUMS</h1>
        <p class="lead w-75 mx-auto animate__animated animate__fadeInUp">Modern University Management System simplifies academic management, empowering students, faculty, and administrators with cutting-edge tools.</p>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-light btn-lg mt-3 animate__animated animate__fadeInUp">Go to Home</a>
    </div>
</div>

<!-- Features Section -->
<div class="container my-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <h2>Our Core Features</h2>
        <p class="text-muted">All-in-one solution for university management</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
            <div class="card border-0 shadow-lg h-100 text-center p-4 hover-animate">
                <img src="https://images.unsplash.com/photo-1581091012184-4cbeb0152c42?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=80" class="mx-auto mb-3" alt="Student Management">
                <h5>Student Management</h5>
                <p class="text-muted">Monitor student progress, submissions, and attendance seamlessly.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
            <div class="card border-0 shadow-lg h-100 text-center p-4 hover-animate">
                <img src="https://images.unsplash.com/photo-1596495577886-d920f0f46ef1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=80" class="mx-auto mb-3" alt="Faculty Management">
                <h5>Faculty Management</h5>
                <p class="text-muted">Streamline course planning, schedules, and communications effectively.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
            <div class="card border-0 shadow-lg h-100 text-center p-4 hover-animate">
                <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=80" class="mx-auto mb-3" alt="Admin Tools">
                <h5>Admin Tools</h5>
                <p class="text-muted">Manage courses, generate reports, and automate administrative tasks.</p>
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="container my-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <h2>Meet Our Team</h2>
        <p class="text-muted">The minds driving MUMS forward</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="team-card text-center p-3 shadow rounded hover-scale">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle mb-3 shadow-lg" alt="Jane Doe" width="150">
                <h5>Jane Doe</h5>
                <p class="text-muted">Project Lead</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-card text-center p-3 shadow rounded hover-scale">
                <img src="https://randomuser.me/api/portraits/men/46.jpg" class="rounded-circle mb-3 shadow-lg" alt="John Smith" width="150">
                <h5>John Smith</h5>
                <p class="text-muted">Lead Developer</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="team-card text-center p-3 shadow rounded hover-scale">
                <img src="https://randomuser.me/api/portraits/women/47.jpg" class="rounded-circle mb-3 shadow-lg" alt="Mary Johnson" width="150">
                <h5>Mary Johnson</h5>
                <p class="text-muted">UI/UX Designer</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="text-center py-5 gradient-cta" data-aos="fade-up">
    <h3 class="text-white">Join MUMS Today</h3>
    <p class="text-white-50 mb-4">Start your journey towards streamlined university management now.</p>
    <a href="<?php echo e(url('/register')); ?>" class="btn btn-light btn-lg">Sign Up Now</a>
</div>

<!-- Custom CSS -->
<style>
.hero-section {
    background-attachment: fixed; /* Parallax effect */
    background-position: center;
    background-size: cover;
}

.overlay {
    z-index: 1;
}

.hero-section h1, .hero-section p, .hero-section a {
    z-index: 2;
    position: relative;
}

.hover-animate:hover {
    transform: translateY(-10px) scale(1.05);
    transition: all 0.4s ease-in-out;
}

.hover-scale:hover {
    transform: scale(1.08);
    transition: 0.4s ease-in-out;
}

.gradient-cta {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    transition: all 0.5s ease-in-out;
}

.gradient-cta:hover {
    background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
}
</style>

<!-- Include AOS JS in main layout -->
<!--
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1200,
    once: true
  });
</script>
-->

<!-- Include Animate.css in main layout head -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel all\myapp\resources\views/about.blade.php ENDPATH**/ ?>