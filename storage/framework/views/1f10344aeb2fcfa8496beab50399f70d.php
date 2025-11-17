<?php $__env->startSection('title', 'MUMS - Users Management'); ?>
<?php $__env->startSection('headerTitle', 'All Users'); ?>

<?php $__env->startSection('content'); ?>
<section id="users" class="mt-5">
    <h2 class="text-info mb-4">Users Management</h2>

    <!-- Filter / Search Form -->
    <form method="GET" action="<?php echo e(route('admin.users')); ?>" class="mb-3 d-flex gap-2">

        <input type="text" name="search" class="form-control"
               placeholder="Search by name, email or mobile"
               value="<?php echo e(request('search')); ?>">

        <select name="limit" class="form-control" onchange="this.form.submit()">
            <option value="5"  <?php echo e(request('limit') == 5 ? 'selected' : ''); ?>>5</option>
            <option value="10" <?php echo e(request('limit') == 10 ? 'selected' : ''); ?>>10</option>
            <option value="15" <?php echo e(request('limit') == 15 ? 'selected' : ''); ?>>15</option>
            <option value="20" <?php echo e(request('limit') == 20 ? 'selected' : ''); ?>>20</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>

        <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-secondary">Reset</a>
    </form>



    <div class="card card-custom p-3 shadow table-responsive">
        <table class="table table-dark table-hover" id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($users->firstItem() + $index); ?></td>
                    <td><?php echo e($user->full_name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <?php $__empty_2 = true; $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                            <span class="badge bg-primary"><?php echo e($role->name); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                            <span class="badge bg-secondary">User</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($user->created_at->format('d M Y')); ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                        <form action="#" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-3">
            <?php echo e($users->links('vendor.pagination.bootstrap-5')); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
.card-custom {
    border-radius: 12px;
    background: #1c1c1e;
    color: #fff;
}
.table-dark th, .table-dark td {
    vertical-align: middle;
}
.badge {
    font-size: 0.85rem;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel all\myapp\resources\views/admin/users.blade.php ENDPATH**/ ?>