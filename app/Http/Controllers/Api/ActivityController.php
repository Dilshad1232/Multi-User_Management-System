<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * 📋 Get all activities (Admin can see all, user only theirs)
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // ✅ If admin, show all activities
        if ($user->hasRole('Admin')) {
            $activities = Activity::with('user')->latest()->get();
        }
        // 👤 Else show only user's activities
        else {
            $activities = Activity::where('user_id', $user->id)
                                   ->with('user')
                                   ->latest()
                                   ->get();
        }

        return response()->json($activities);
    }

    /**
     * 📝 Log a new activity (automatically used in controllers)
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'action' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $activity = Activity::create($request->only(['user_id', 'action', 'description']));

        return response()->json([
            'message' => 'Activity logged successfully',
            'data' => $activity
        ]);
    }
}
