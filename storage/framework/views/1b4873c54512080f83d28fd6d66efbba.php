<?php $__env->startSection('title', 'MUMS | User Registration'); ?>

<?php $__env->startSection('content'); ?>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #1a0a3b, #0c0c2c); /* dark-purple to deep blue */
    overflow-x: hidden;
}

/* Bubble Background */
.bubble-bg {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
}

.bubble {
    position: absolute;
    bottom: -100px;
    border-radius: 50%;
    animation: rise 20s linear infinite;
}

@keyframes rise {
    0% { transform: translateY(0) scale(0.5); opacity: 0.5; }
    50% { opacity: 0.8; }
    100% { transform: translateY(-120vh) scale(1); opacity: 0; }
}

/* Registration wrapper */
.register-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
}

/* Card 3D style */
.register-box-3d {
    background: rgba(20, 5, 30, 0.85);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(100, 150, 255, 0.2);
    border-radius: 25px;
    box-shadow: 0 20px 50px rgba(50,50,200,0.25), inset 0 0 15px rgba(100,150,255,0.1);
    width: 90%;
    max-width: 950px;
    padding: 35px 45px;
    text-align: center;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.register-box-3d:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 30px 60px rgba(50,50,200,0.35), inset 0 0 20px rgba(100,150,255,0.15);
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

/* Inputs 3D */
.form-control-3d {
    width: 100%;
    padding: 12px 15px;
    border-radius: 12px;
    border: 1px solid rgba(100,150,255,0.4);
    background: rgba(20,5,30,0.85);
    color: #fff;
    box-shadow: inset 2px 2px 8px rgba(0,0,50,0.2), inset -2px -2px 8px rgba(255,255,255,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    margin-bottom: 12px;
}
.form-control-3d:focus {
    outline: none;
    transform: translateY(-2px);
    box-shadow: inset 2px 2px 10px rgba(0,0,50,0.3), inset -2px -2px 10px rgba(255,255,255,0.1);
    background: rgba(30,10,60,0.9);
}

/* Button 3D */
.register-btn-3d {
    background: linear-gradient(135deg, #4b3bff, #2b2bff);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 12px;
    padding: 15px 20px;
    width: 100%;
    font-size: 16px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.register-btn-3d:hover {
    background: linear-gradient(135deg, #6b5bff, #3b3bff);
    box-shadow: 0 8px 20px rgba(75,75,255,0.4);
    transform: translateY(-3px) scale(1.02);
}

.text-small {
    font-size: 14px;
    text-align: center;
}

@media (max-width: 992px) {
    .register-box-3d {
        padding: 30px 25px;
        width: 95%;
    }
}
</style>

<!-- Bubble Background -->
<div class="bubble-bg" id="bubble-bg"></div>

<div class="register-wrapper">
    <div class="register-box-3d mt-5" data-tilt>
        <h2>User Registration</h2>
        <p>Create your account and join MUMS Portal</p>

        <?php if(session('success')): ?>
        <div class="bg-success bg-opacity-25 text-success border border-success p-2 rounded mb-3 small">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <form action="<?php echo e(route('store')); ?>" method="POST" enctype="multipart/form-data" class="mt-3">
            <?php echo csrf_field(); ?>
            <div class="row g-3">

                <div class="col-md-4">
                    <label>Full Name</label>
                    <input type="text" name="full_name" value="<?php echo e(old('full_name')); ?>" class="form-control-3d" required>
                    <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4">
                    <label>Father's Name</label>
                    <input type="text" name="father_name" value="<?php echo e(old('father_name')); ?>" class="form-control-3d" required>
                    <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control-3d" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4">
                    <label>Mobile No.</label>
                    <input type="text" name="mobile_no" value="<?php echo e(old('mobile_no')); ?>" class="form-control-3d" required>
                    <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control-3d" required>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control-3d" required>
                </div>

                <div class="col-md-4">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control-3d">
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4">
                    <label>District</label>
                    <input type="text" name="district" value="<?php echo e(old('district')); ?>" class="form-control-3d">
                    <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-4">
                    <label>Pin Code</label>
                    <input type="text" name="pin_code" value="<?php echo e(old('pin_code')); ?>" class="form-control-3d">
                    <?php $__errorArgs = ['pin_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6">
                    <label>Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control-3d">
                    <?php $__errorArgs = ['profile_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 d-flex align-items-end justify-content-end">
                    <button type="submit" class="register-btn-3d">Register Now</button>
                </div>

            </div>
        </form>

        <p class="text-small mt-3">
            Already have an account?
            <a href="<?php echo e(route('login')); ?>" class="text-warning text-decoration-none fw-bold">Login</a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.7.3/dist/vanilla-tilt.min.js"></script>
<script>
VanillaTilt.init(document.querySelectorAll("[data-tilt]"), {
    max: 10,
    speed: 400,
    glare: true,
    "max-glare": 0.2,
});

/* Generate bubbles */
const bubbleContainer = document.getElementById('bubble-bg');
for(let i=0;i<35;i++){
    let bubble = document.createElement('div');
    bubble.classList.add('bubble');
    let size = Math.random() * 50 + 10;
    bubble.style.width = size + 'px';
    bubble.style.height = size + 'px';
    bubble.style.left = Math.random() * 100 + '%';
    bubble.style.animationDuration = (Math.random() * 15 + 10) + 's';
    let colorR = 50 + Math.floor(Math.random() * 100);
    let colorG = 50 + Math.floor(Math.random() * 100);
    let colorB = 200 + Math.floor(Math.random() * 55);
    bubble.style.backgroundColor = `rgba(${colorR},${colorG},${colorB},${Math.random()*0.3 + 0.1})`;
    bubbleContainer.appendChild(bubble);
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel all\myapp\resources\views/auth/register.blade.php ENDPATH**/ ?>