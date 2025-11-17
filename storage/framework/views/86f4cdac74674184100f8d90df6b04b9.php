<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo $__env->yieldContent('title', 'MUMS'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body { background:#0D1B2A; color:#fff; font-family:'Inter',sans-serif; overflow-x:hidden; margin:0; }
    .sidebar{background:linear-gradient(to bottom,#0D1B2A,#1B263B);width:250px;position:fixed;top:0;left:0;height:100vh;
      display:flex;flex-direction:column;justify-content:space-between;transition:all .3s ease;z-index:1030;}
    .sidebar-content{flex:1;overflow-y:auto;padding-top:70px;scrollbar-width:thin;scrollbar-color:#00F0FF #1B263B;}
    .sidebar-content::-webkit-scrollbar{width:6px;}
    .sidebar-content::-webkit-scrollbar-thumb{background-color:#00F0FF;border-radius:4px;}
    .sidebar.collapsed{transform:translateX(-100%);}
    .sidebar .nav-link{color:#fff;transition:.3s;padding:10px 15px;border-radius:5px;}
    .sidebar .nav-link:hover{background-color:#00FFFF33;color:#00F0FF;}
    .main-content{margin-left:250px;transition:margin-left .3s ease;padding-top:70px;}
    .header{background:#16202F;position:fixed;top:0;left:0;width:100%;z-index:1040;height:70px;}
    .footer{background:#16202F;color:#ccc;}
    .btn-cyan{background:#00F0FF;color:#0D1B2A;font-weight:600;border:none;}
    .btn-cyan:hover{background:#00C7D7;color:#fff;}
    .card-custom{background:#1B263B;border:none;}
    .card-custom h5,.card-custom p{color:#ccc;}
    @media(max-width:991px){
      .sidebar{transform:translateX(-100%);position:fixed;width:250px;}
      .sidebar.show{transform:translateX(0);}
      .main-content{margin-left:0;}
    }
  </style>
</head>
<body>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg header shadow px-3">
    <div class="container-fluid">
      <button class="btn btn-outline-light d-lg-none" id="sidebarToggle">☰</button>
      <span class="navbar-brand text-light fw-bold ms-2">
        <span class="navbar-brand ms-2 text-light">
            Welcome [ User ] => <span style="color: green;"><?php echo e(auth()->user()->full_name); ?></span>
        </span>

    </span>

    </div>
  </nav>
  <?php $__env->startSection('sidebarLinks'); ?>
  <li class="nav-item"><a href="<?php echo e(route('user.dashboard')); ?>" class="nav-link">🏠 Dashboard</a></li>
  <li class="nav-item"><a href="<?php echo e(route('user.profile')); ?>" class="nav-link">👤 Profile</a></li>
  <li class="nav-item"><a href="<?php echo e(route('user.submission')); ?>" class="nav-link">📝 New Submission</a></li>
  <li class="nav-item"><a href="<?php echo e(route('user.track-submissions')); ?>" class="nav-link">📊 Track Submissions</a></li>
  <li class="nav-item"><a href="<?php echo e(route('user.notification')); ?>" class="nav-link">🔔 Notifications</a></li>
  <?php $__env->stopSection(); ?>
  <!-- Sidebar -->
  <nav id="sidebar" class="sidebar">
    <div class="sidebar-content p-3">
      <h4 class="fw-bold text-info mb-4 text-center">Welcome, <?php echo e(Auth::user()->name); ?></h4>
      <ul class="nav flex-column gap-2">
        <?php echo $__env->yieldContent('sidebarLinks'); ?>
      </ul>
    </div>
    <div class="p-3 border-top border-secondary text-center">
      <form method="POST" action="<?php echo e(url('/logout')); ?>">
        <?php echo csrf_field(); ?>
        <button class="btn btn-cyan w-100 fw-bold">Logout</button>
      </form>
    </div>
  </nav>

  <!-- Main Content -->
  <div id="mainContent" class="main-content">
    <main class="p-3 p-md-4">
      <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="footer text-center py-3 mt-4">&copy; <?php echo e(date('Y')); ?> MUMS. All rights reserved.</footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const sidebar=document.getElementById('sidebar');
    const sidebarToggle=document.getElementById('sidebarToggle');
    sidebarToggle.addEventListener('click',()=>{sidebar.classList.toggle('show');});
  </script>

  <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\laravel all\myapp\resources\views/user/dashboard/layouts/app.blade.php ENDPATH**/ ?>