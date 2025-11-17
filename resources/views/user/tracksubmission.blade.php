@extends('user.dashboard.layouts.app')

@section('title', 'Track Submissions')
@section('headerTitle', 'Track Your Submissions')

@section('content')
<section>
    <h3 class="text-info mb-3">Track Submissions</h3>

    <!-- 🔍 Search & Per Page Controls -->
    <form method="GET" action="{{ route('user.track-submissions') }}" class="mb-3 d-flex align-items-center gap-2 flex-wrap">
        <input type="text" name="search" class="form-control bg-dark text-light border-0"
               placeholder="Search by title..." value="{{ request('search') }}" style="max-width: 250px;">

        <select name="per_page" class="form-select bg-dark text-light border-0" style="width: auto;" onchange="this.form.submit()">
            <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5 per page</option>
            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10 per page</option>
            <option value="15" {{ $perPage == 15 ? 'selected' : '' }}>15 per page</option>
            <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25 per page</option>
        </select>

        <button type="submit" class="btn btn-primary">Search</button>

        @if(request('search'))
            <a href="{{ route('user.track-submissions') }}" class="btn btn-secondary">Reset</a>
        @endif
    </form>

    <!-- 📋 Table -->
    <div class="card card-custom p-4 shadow table-responsive">
        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Document</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Last Updated</th>
                </tr>
            </thead>
            <tbody>
                @forelse($submissions as $index => $submission)
                <tr>
                    <td>{{ $submissions->firstItem() + $index }}</td>
                    <td>{{ $submission->title }}</td>
                    <td>
                        @if($submission->document_path)
                            <a href="{{ asset('storage/' . $submission->document_path) }}" target="_blank" class="text-info">View</a>
                        @else
                            <span class="text-muted">No File</span>
                        @endif
                    </td>
                    <td>
                        @php
                            $status = $submission->status->name ?? 'Pending';
                            $statusClass = match($status) {
                                'Approved' => 'bg-success',
                                'Pending' => 'bg-warning text-dark',
                                'Rejected' => 'bg-danger',
                                default => 'bg-secondary'
                            };
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ $status }}</span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($submission->created_at)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($submission->updated_at)->format('d M Y b') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No submissions found.</td>
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
@endsection
