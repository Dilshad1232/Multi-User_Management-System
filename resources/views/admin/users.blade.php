@extends('admin.layouts.master')

@section('title', 'MUMS - Users Management')
@section('headerTitle', 'All Users')

@section('content')
<section id="users" class="mt-5">
    <h2 class="text-info mb-4">Users Management</h2>

    <!-- Filter / Search Form -->
    <form method="GET" action="{{ route('admin.users') }}" class="mb-3 d-flex gap-2">

        <input type="text" name="search" class="form-control"
               placeholder="Search by name, email or mobile"
               value="{{ request('search') }}">

        <select name="limit" class="form-control" onchange="this.form.submit()">
            <option value="5"  {{ request('limit') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
            <option value="15" {{ request('limit') == 15 ? 'selected' : '' }}>15</option>
            <option value="20" {{ request('limit') == 20 ? 'selected' : '' }}>20</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>

        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Reset</a>
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
                @forelse($users as $index => $user)
                <tr>
                    <td>{{ $users->firstItem() + $index }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @forelse($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @empty
                            <span class="badge bg-secondary">User</span>
                        @endforelse
                    </td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                        <form action="#" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $users->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</section>
@endsection

@section('styles')
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
@endsection
