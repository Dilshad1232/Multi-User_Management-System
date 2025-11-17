<div class="sidebar p-3 flex-shrink-0" id="sidebar">
    <h3 class="text-center text-info mb-4">MUMS Admin</h3>
    <ul class="nav flex-column gap-2">
        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link active">📊 Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('admin.users') }}" class="nav-link">👤 User Management</a></li>
        <li class="nav-item"><a href="{{ route('admin.submissions') }}" class="nav-link">📄 Submissions</a></li>
        <li class="nav-item"><a href="#" class="nav-link">🕒 Activity Logs</a></li>
        <li class="nav-item"><a href="{{ route('admin.settings') }}" class="nav-link">⚙️ Settings</a></li>
        <li class="nav-item"><a href="{{ route('admin.profile') }}" class="nav-link">🕒 Profile</a></li>
        <li class="nav-item"><a href="#" class="nav-link">🔔 Notifications</a></li>
    </ul>
    <form method="POST" action="{{ url('/logout') }}" class="mt-4">
        @csrf
        <button class="btn w-100 bg-cyan">Logout</button>
    </form>
</div>
