<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    // public function users(){
    //     $users = \App\Models\User::all();
    //     return view('admin.users', compact('users'));
    // }
    public function users(Request $request){
        $query = \App\Models\User::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('father_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile_no', 'like', "%{$search}%");
            });
        }

        // Pagination limit (5,10,15,20)
        $limit = $request->input('limit', 5); // default 10

        $users = $query->orderBy('created_at', 'desc')
                       ->paginate($limit)
                       ->withQueryString();

        return view('admin.users', compact('users'));
    }

    public function admindashboard(Request $request)
    {
        // 🔍 Search filter
        $query = Submission::with('user', 'status');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhereHas('user', function ($q) use ($request) {
                      $q->where('name', 'like', '%' . $request->search . '%');
                  });
        }

        // 🔢 Per page option (default 5)
        $perPage = $request->get('per_page', 5);

        // 📋 Get paginated submissions
        $submissions = $query->orderBy('created_at', 'desc')
                             ->paginate($perPage)
                             ->appends([
                                 'search' => $request->search,
                                 'per_page' => $perPage,
                             ]);

        // 📊 Dashboard counts
        return view('admin.dashboard', [
            'totalUsers' => \App\Models\User::count(),
            'totalAdmins' => \Spatie\Permission\Models\Role::where('name', 'admin')->first()?->users()->count() ?? 0,
            'newSubmissions' => \App\Models\Submission::whereDate('created_at', now())->count(),
            'pendingSubmissions' => \App\Models\Submission::where('status_id', 1)->count(),
            'submissions' => $submissions,
            'perPage' => $perPage,
        ]);
    }
    public function approveSubmission($id)
    {
        $submission = \App\Models\Submission::findOrFail($id);

        // Manually change only what you want
        $submission->status_id = 2; // Approved

        // ✅ Preserve original created_at
        $originalCreatedAt = $submission->created_at;

        // ✅ Save status without timestamps
        $submission->timestamps = false;
        $submission->save();

        // ✅ Now manually update only updated_at
        $submission->updated_at = now();
        $submission->created_at = $originalCreatedAt;
        $submission->save();

        return back()->with('success', 'Submission approved successfully.');
    }

    public function rejectSubmission($id)
    {
        $submission = \App\Models\Submission::findOrFail($id);

        $submission->status_id = 3; // Rejected
        $originalCreatedAt = $submission->created_at;

        $submission->timestamps = false;
        $submission->save();

        $submission->updated_at = now();
        $submission->created_at = $originalCreatedAt;
        $submission->save();

        return back()->with('error', 'Submission rejected successfully.');
    }

        public function submissions(){
            $submissions = \App\Models\Submission::with('user', 'status')->get();
            return view('admin.submissions', compact('submissions'));
        }

    // public function submissions(){
    //     $submissions = \App\Models\Submission::with('user', 'status')->get();
    //     return view('admin.submissions', compact('submissions'));
    // }

    public function profile(){

        $user = auth()->user();   // logged-in admin ka data

        return view('admin.profile', compact('user'));

    }
}
