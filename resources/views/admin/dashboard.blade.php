@extends('admin.layouts.master')

@section('title','MUMS Admin Dashboard')

@section('content')
<section id="dashboard" class="mb-5">
    <h2 class="text-info mb-4">Dashboard Overview</h2>
    <div class="row g-3">
        <!-- Total Users -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>Total Users</h5>
                <p class="display-6">{{ $totalUsers }}</p>
            </div>
        </div>

        <!-- Total Admins -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>Total Admins</h5>
                <p class="display-6">{{ $totalAdmins }}</p>
            </div>
        </div>

        <!-- New Submissions Today -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>New Submissions</h5>
                <p class="display-6">{{ $newSubmissions }}</p>
            </div>
        </div>

        <!-- Pending Submissions -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card card-custom p-3 text-center shadow">
                <h5>Pending Submissions</h5>
                <p class="display-6">{{ $pendingSubmissions }}</p>
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
    <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-3 d-flex align-items-center gap-2 flex-wrap">
        <input type="text" name="search" class="form-control bg-dark text-light border-0"
               placeholder="Search by title or user..." value="{{ request('search') }}" style="max-width: 250px;">

        <select name="per_page" class="form-select bg-dark text-light border-0" style="width: auto;" onchange="this.form.submit()">
            <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5 per page</option>
            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10 per page</option>
            <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15 per page</option>
            <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25 per page</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>

        @if(request('search'))
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Reset</a>
        @endif

        @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

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
                @forelse($submissions as $index => $submission)
                <tr>
                    <td>{{ $submissions->firstItem() + $index }}</td>
                    <td>{{ $submission->user->full_name ?? 'N/A' }}</td>
                    <td>{{ $submission->title }}</td>

                    <td>
                        @if($submission->status)
                            <span class="badge
                                {{ $submission->status->name == 'Approved' ? 'bg-success' : '' }}
                                {{ $submission->status->name == 'Pending' ? 'bg-warning text-dark' : '' }}
                                {{ $submission->status->name == 'Rejected' ? 'bg-danger' : '' }}">
                                {{ $submission->status->name }}
                            </span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>

                    <td>
                        @if($submission->document_path)
                            <a href="{{ asset('storage/' . $submission->document_path) }}" target="_blank" class="text-info">View</a>
                        @else
                            <span class="text-muted">No file</span>
                        @endif
                    </td>

                    <td class="d-flex gap-2">
                        <form action="{{ route('admin.submissions.approve', $submission->id) }}" method="POST" onsubmit="return confirm('Approve this submission?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>

                        <form action="{{ route('admin.submissions.reject', $submission->id) }}" method="POST" onsubmit="return confirm('Reject this submission?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No submissions found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- 🔢 Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $submissions->links('pagination::bootstrap-5') }}
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
@endsection

@section('scripts')
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
@endsection
