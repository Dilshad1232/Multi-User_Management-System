<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Activity;
use App\Models\Notification;

class SubmissionController extends Controller
{
    // Admin: fetch all submissions
    public function adminIndex()
    {
        $submissions = Submission::with(['user','status'])->latest()->get();

        return response()->json([
            'status' => true,
            'data' => $submissions
        ]);
    }

    // Admin: update status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'required|in:1,2,3'
        ]);

        $submission = Submission::findOrFail($id);
        $submission->update(['status_id' => $request->status_id]);

        // Log admin action
        Activity::create([
            'user_id' => auth()->id(),
            'action' => 'Updated Submission Status',
            'details' => "Submission #{$id} updated to status {$request->status_id}"
        ]);

        // Notify user
        Notification::create([
            'user_id' => $submission->user_id,
            'message' => "Your submission '{$submission->title}' status updated."
        ]);

        return response()->json(['status' => true, 'message' => 'Status updated successfully']);
    }
}
