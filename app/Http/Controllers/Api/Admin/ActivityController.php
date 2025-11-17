<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * 🧾 Show all activities (for Admin)
     * Admin can see all user + admin actions in the system.
     */
    public function index()
    {
        // All logs with latest first
        $activities = Activity::with('user:id,name,email')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'All system activities fetched successfully ✅',
            'data' => $activities
        ], 200);
    }
}
