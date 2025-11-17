<?php $__env->startSection('title','MUMS Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<section id="dashboard" class="mb-5">
    <h2 class="text-info mb-4">Dashboard Overview</h2>
    <div class="row g-3">
        <!-- Total Users -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>Total Users</h5>
                <p class="display-6"><?php echo e($totalUsers); ?></p>
            </div>
        </div>

        <!-- Total Admins -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>Total Admins</h5>
                <p class="display-6"><?php echo e($totalAdmins); ?></p>
            </div>
        </div>

        <!-- New Submissions Today -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>New Submissions</h5>
                <p class="display-6"><?php echo e($newSubmissions); ?></p>
            </div>
        </div>

        <!-- Pending Submissions -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>Pending Submissions</h5>
                <p class="display-6"><?php echo e($pendingSubmissions); ?></p>
            </div>
        </div>
    </div>
</section>
<style>
    .card-custom {
        min-height: 150px;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #1c1c1e;
        color: #fff;
    }
    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }
    .card-custom h5 {
        font-weight: 600;
        color: #00FFC6;
    }
    </style>


<section id="submissions" class="mb-5">
    <h2 class="text-info mb-4">Submissions Management</h2>

    <!-- 🔍 Search & Per Page Controls -->
    <form method="GET" action="<?php echo e(route('admin.dashboard')); ?>" class="mb-3 d-flex align-items-center gap-2 flex-wrap">
        <input type="text" name="search" class="form-control bg-dark text-light border-0"
               placeholder="Search by title or user..." value="<?php echo e(request('search')); ?>" style="max-width: 250px;">

        <select name="per_page" class="form-select bg-dark text-light border-0" style="width: auto;" onchange="this.form.submit()">
            <option value="5" <?php echo e($perPage == 5 ? 'selected' : ''); ?>>5 per page</option>
            <option value="10" <?php echo e($perPage == 10 ? 'selected' : ''); ?>>10 per page</option>
            <option value="15" <?php echo e($perPage == 15 ? 'selected' : ''); ?>>15 per page</option>
            <option value="25" <?php echo e($perPage == 25 ? 'selected' : ''); ?>>25 per page</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>

        <?php if(request('search')): ?>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-secondary">Reset</a>
        <?php endif; ?>

        <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

    </form>

    <!-- 📋 Table -->
    <div class="card card-custom p-3 shadow table-responsive">
        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Attachment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($submissions->firstItem() + $index); ?></td>
                    <td><?php echo e($submission->user->full_name ?? 'N/A'); ?></td>
                    <td><?php echo e($submission->title); ?></td>

                    <td>
                        <?php if($submission->status): ?>
                            <span class="badge
                                <?php echo e($submission->status->name == 'Approved' ? 'bg-success' : ''); ?>

                                <?php echo e($submission->status->name == 'Pending' ? 'bg-warning text-dark' : ''); ?>

                                <?php echo e($submission->status->name == 'Rejected' ? 'bg-danger' : ''); ?>">
                                <?php echo e($submission->status->name); ?>

                            </span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Unknown</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php if($submission->document_path): ?>
                            <a href="<?php echo e(asset('storage/' . $submission->document_path)); ?>" target="_blank" class="text-info">View</a>
                        <?php else: ?>
                            <span class="text-muted">No file</span>
                        <?php endif; ?>
                    </td>

                    <td class="d-flex gap-2">
                        <form action="<?php echo e(route('admin.submissions.approve', $submission->id)); ?>" method="POST" onsubmit="return confirm('Approve this submission?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>

                        <form action="<?php echo e(route('admin.submissions.reject', $submission->id)); ?>" method="POST" onsubmit="return confirm('Reject this submission?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                        </form>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">No submissions found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- 🔢 Pagination -->
        <div class="d-flex justify-content-center mt-3">
            <?php echo e($submissions->links('pagination::bootstrap-5')); ?>

        </div>
    </div>
</section>


<section id="notifications" class="mb-5">
    <h2 class="text-info mb-4">Notifications</h2>
    <div class="card card-custom p-3 shadow">
        <textarea class="form-control bg-dark text-white mb-3" rows="3" id="notificationText" placeholder="Write your notification..."></textarea>
        <button class="btn bg-cyan" id="sendNotificationBtn">Send Notification</button>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
const token = localStorage.getItem('auth_token');

async function fetchDashboard() {
    try {
        // Fetch submissions
        const resSub = await fetch('/api/admin/submissions',{
            headers:{'Authorization':`Bearer ${token}`}
        });
        const resultSub = await resSub.json();
        const submissions = resultSub.data;

        // Update dashboard cards
        document.getElementById('totalSubmissions').innerText = submissions.length;
        document.getElementById('approvedSubmissions').innerText = submissions.filter(s=>s.status.name==='Approved').length;
        document.getElementById('pendingSubmissions').innerText = submissions.filter(s=>s.status.name==='Pending').length;

        // Fill submissions table
        const tbody = document.querySelector('#submissionsTable tbody');
        tbody.innerHTML = '';
        submissions.forEach((s,i)=>{
            const statusClass = s.status.name==='Approved'?'bg-success':
                                s.status.name==='Pending'?'bg-warning text-dark':'bg-secondary';
            tbody.innerHTML += `
            <tr>
                <td>${i+1}</td>
                <td>${s.user.name}</td>
                <td>${s.title}</td>
                <td><span class="badge ${statusClass}">${s.status.name}</span></td>
                <td><a href="${s.document_path?'/storage/'+s.document_path:'#'}" class="text-info">Download</a></td>
                <td>
                    <button class="btn btn-sm btn-success" onclick="updateStatus(${s.id},2)">Approve</button>
                    <button class="btn btn-sm btn-danger" onclick="updateStatus(${s.id},3)">Reject</button>
                </td>
            </tr>`;
        });

        // Fetch notifications
        const resNotif = await fetch('/api/admin/notifications/all',{
            headers:{'Authorization':`Bearer ${token}`}
        });
        const resultNotif = await resNotif.json();
        document.getElementById('totalNotifications').innerText = resultNotif.data.length;

    } catch(e){ console.error(e); }
}

async function updateStatus(id,statusId){
    await fetch(`/api/admin/submissions/${id}/status`,{
        method:'PUT',
        headers:{
            'Authorization':`Bearer ${token}`,
            'Content-Type':'application/json'
        },
        body:JSON.stringify({status_id:statusId})
    });
    fetchDashboard();
}

document.getElementById('sendNotificationBtn').addEventListener('click', async()=>{
    const msg = document.getElementById('notificationText').value;
    if(!msg) return alert('Write notification first');
    await fetch('/api/admin/notifications',{
        method:'POST',
        headers:{
            'Authorization':`Bearer ${token}`,
            'Content-Type':'application/json'
        },
        body:JSON.stringify({message:msg})
    });
    document.getElementById('notificationText').value='';
    fetchDashboard();
});

fetchDashboard();
setInterval(fetchDashboard,10000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel all\myapp\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>