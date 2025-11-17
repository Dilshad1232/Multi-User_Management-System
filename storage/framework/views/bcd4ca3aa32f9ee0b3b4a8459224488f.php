<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="btn btn-outline-light d-lg-none" id="sidebarToggle">☰</button>
        <span class="navbar-brand ms-2">
            Welcome [ Admin ] => <span style="color: green;"><?php echo e(auth()->user()->full_name); ?></span>

        </span>
    </div>
</nav>

<script>
const toggleBtn = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
toggleBtn?.addEventListener('click', () => { sidebar.classList.toggle('show'); });
</script>
<?php /**PATH D:\laravel all\myapp\resources\views/admin/layouts/header.blade.php ENDPATH**/ ?>