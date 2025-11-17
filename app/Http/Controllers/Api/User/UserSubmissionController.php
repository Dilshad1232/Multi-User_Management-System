<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Notification;

class UserSubmissionController extends Controller
{
    // Show new submission form
    public function create() {
        return view('user.submission');
    }

    // Store new submission
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'document' => 'required|file|mimes:pdf,doc,docx',
        ]);

            // Store file in public disk
    if ($request->hasFile('document')) {
        $filePath = $request->file('document')->store('submissions', 'public');
    } else {
        return redirect()->back()->withErrors('Document upload failed.');
    }
        Submission::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'document_path' => $filePath, // save relative path
            'status_id' => 1, // Pending
        ]);

        return redirect()->back()->with('success', 'Submission created successfully!');
    }


    // Track submissions page
    public function track(Request $request)
    {
        $query = Submission::with('status')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc');

        // 🔍 Search Filter
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // 🔢 Records per page (default 5)
        $perPage = $request->get('per_page', 5);

        // 🧾 Paginate results
        $submissions = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'per_page' => $perPage,
        ]);

        return view('user.tracksubmission', compact('submissions', 'perPage'));
    }


    // Notifications page
    public function notification()
    {
        return view('user.notification');
    }



}
