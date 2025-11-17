<?php $__env->startSection('content'); ?>

<div class="container-fluid py-5">

    <div class="profile-container mx-auto shadow-xl rounded-4 overflow-hidden">

        <!-- Profile Sidebar -->
        <div class="profile-sidebar text-center glass-sidebar">
            <div class="sidebar-photo mx-auto glow-box">
                <img id="previewImage"
                     src="<?php echo e($user->profile_photo ? asset('profiles/' . $user->profile_photo) : asset('img/default-user.jpg')); ?>">
            </div>

            <div class="sidebar-name mt-3 text-uppercase"><?php echo e($user->full_name); ?></div>

            <div class="sidebar-userid text-warning fw-bold mt-1">
                User ID: [ <?php echo e($user->user_id); ?> ]
            </div>

            <div class="sidebar-role">Role : [ <?php echo e($user->role ?? 'User'); ?> ]</div>

            <div class="social-links mt-4 d-flex justify-content-center gap-4">
                <a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
                <a href="https://wa.me/<?php echo e($user->mobile_no); ?>" target="_blank" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:<?php echo e($user->email); ?>" class="social-icon"><i class="fas fa-envelope"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-telegram"></i></a>
            </div>
        </div>

        <!-- Edit Form Section -->
        <div class="profile-details glass-details">
            <h2 class="pb-3 mb-4 text-warning border-bottom border-secondary">Edit Profile

                <?php if(session('success')): ?>
    <div class="alert alert-success mb-3 p-3 rounded">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger mb-3 p-3 rounded">
        <ul class="m-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

            </h2>

            <form action="<?php echo e(route('user.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="profile-info">

                    <div class="input-group-custom">
                        <label>Full Name</label>
                        <input type="text" name="full_name" value="<?php echo e($user->full_name); ?>">
                    </div>

                    <div class="input-group-custom">
                        <label>Father's Name</label>
                        <input type="text" name="father_name" value="<?php echo e($user->father_name); ?>">
                    </div>

                    <div class="input-group-custom">
                        <label>Mobile No.</label>
                        <input type="text" name="mobile_no" value="<?php echo e($user->mobile_no); ?>">
                    </div>

                    <div class="input-group-custom">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo e($user->email); ?>">
                    </div>

                    <div class="input-group-custom">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo e($user->address); ?>">
                    </div>

                    <div class="input-group-custom">
                        <label>District</label>
                        <input type="text" name="district" value="<?php echo e($user->district); ?>">
                    </div>

                    <div class="input-group-custom">
                        <label>Pin Code</label>
                        <input type="text" name="pin_code" value="<?php echo e($user->pin_code); ?>">
                    </div>

                    <div class="input-group-custom">
                        <label>Profile Photo</label>
                        <input type="file" name="profile_photo" id="imageInput">
                    </div>

                </div>

                <div class="buttons mt-4">
                    <button class="save-btn">Save Changes</button>
                    <a href="<?php echo e(route('user.profile.edit')); ?>" class="cancel-btn">Cancel</a>
                </div>

            </form>
        </div>

    </div>

</div>

<script>
document.getElementById("imageInput").addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        document.getElementById("previewImage").src = URL.createObjectURL(file);
    }
});
</script>

<style>
/* ✨ GLASS EFFECT BACKGROUND */
.glass-sidebar {
    background: rgba(50, 20, 20, 0.5);
    backdrop-filter: blur(12px);
}
.glass-details {
    background: rgba(80, 30, 30, 0.4);
    backdrop-filter: blur(10px);
}

/* Main Layout */
.profile-container {
    display: flex;
    flex-wrap: wrap;
    max-width: 1000px;
    background: #1a0909;
    border: 1px solid #3b2323;
    border-radius: 15px;
}

/* Sidebar */
.profile-sidebar {
    flex: 0 0 280px;
    padding: 50px 20px;
    border-right: 2px solid #8b2b2b;
    color: #fff;
}

.sidebar-photo {
    width: 140px;
    height: 160px;
    border-radius: 12px;
    overflow: hidden;
    border: 3px solid #e84b3a;
}

.sidebar-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.sidebar-name {
    font-size: 22px;
    font-weight: 700;
    margin-top: 18px;
}

.social-icon {
    font-size: 20px;
    color: #ffd1c1;
    transition: .3s;
}
.social-icon:hover {
    color: #fff;
    transform: scale(1.2);
}

/* Details */
.profile-details {
    flex: 1;
    padding: 40px 50px;
    color: #fff;
}

/* INPUT GROUP PREMIUM STYLE */
.input-group-custom {
    margin-bottom: 18px;
    display: flex;
    flex-direction: column;
}

.input-group-custom label {
    color: #ffcd91;
    font-weight: 600;
    margin-bottom: 6px;
}

.input-group-custom input {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid #c75454;
    padding: 10px 12px;
    color: #fff;
    border-radius: 6px;
    transition: .3s;
}
.input-group-custom input:focus {
    border-color: #ff9b72;
    box-shadow: 0 0 5px #ff9b72aa;
    outline: none;
}

/* BUTTONS */
.save-btn {
    padding: 12px 30px;
    background: #e84b3a;
    color: #fff;
    border-radius: 8px;
    font-weight: 700;
    transition: .3s;
}
.save-btn:hover {
    background: #ff6347;
}

.cancel-btn {
    padding: 12px 30px;
    background: #5a1f1f;
    color: #fff;
    border-radius: 8px;
    font-weight: 700;
    transition: .3s;
}
.cancel-btn:hover {
    background: #8b2b2b;
}

.buttons {
    display: flex;
    gap: 15px;
}

/* Responsive */
@media (max-width: 992px) {
    .profile-container {
        flex-direction: column;
    }
    .profile-sidebar {
        border-right: none;
        border-bottom: 2px solid #8b2b2b;
    }
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.dashboard.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel all\myapp\resources\views/user/profile-edit.blade.php ENDPATH**/ ?>