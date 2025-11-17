@extends('user.dashboard.layouts.app')

@section('title', 'Notifications')
@section('headerTitle', 'Your Notifications')

{{-- @section('sidebarLinks')
<li class="nav-item"><a href="{{ route('user.dashboard') }}" class="nav-link">🏠 Dashboard</a></li>
<li class="nav-item"><a href="{{ route('user.submission') }}" class="nav-link">📝 New Submission</a></li>
<li class="nav-item"><a href="{{ route('user.track-submissions') }}" class="nav-link">📊 Track Submissions</a></li>
<li class="nav-item"><a href="{{ route('user.notifications') }}" class="nav-link active">🔔 Notifications</a></li>
@endsection --}}

@section('content')

<section>
    <h3 class="text-info mb-3">Notifications</h3>
    <div class="card card-custom p-4 shadow table-responsive">
        <table class="table table-dark table-hover align-middle" id="notificationsTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <!-- JS will populate notifications -->
            </tbody>
        </table>
    </div>
</section>

@endsection

@section('scripts')
<script>
const token = localStorage.getItem('auth_token');

// ========================
// Fetch Notifications
// ========================
function fetchNotifications() {
    fetch('/api/notifications', { headers: { 'Authorization': `Bearer ${token}` } })
    .then(res => res.json())
    .then(data => {
        const tbody = document.querySelector('#notificationsTable tbody');
        tbody.innerHTML = '';
        data.forEach((n, index) => {
            tbody.innerHTML += `
                <tr>
                    <td>${index+1}</td>
                    <td>${n.message}</td>
                    <td>${new Date(n.created_at).toLocaleDateString()}</td>
                </tr>`;
        });
    });
}

// Initial fetch
fetchNotifications();

// Auto-refresh every 10 sec
setInterval(fetchNotifications, 10000);
</script>
@endsection
