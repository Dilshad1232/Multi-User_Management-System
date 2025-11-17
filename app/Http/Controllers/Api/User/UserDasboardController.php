<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\Request;

class UserDasboardController extends Controller
{
    //

    public function dashboard()
    {
        $userId = auth()->id();

        $submissions = Submission::with('status')
                        ->where('user_id', $userId)
                        ->get();

        $totalSubmissions = $submissions->count();
        $approvedSubmissions = $submissions->filter(fn($s) => $s->status && $s->status->name === 'Approved')->count();
        $pendingSubmissions = $submissions->filter(fn($s) => $s->status && $s->status->name === 'Pending')->count();
        $totalNotifications = auth()->user()->notifications()->where('is_read', false)->count();

        return view('user.dashboard', compact(
            'totalSubmissions',
            'approvedSubmissions',
            'pendingSubmissions',
            'totalNotifications'
        ));
    }
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }
}
