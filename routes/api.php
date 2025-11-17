<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\API\SubmissionController;
use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\SettingController;

/*
|--------------------------------------------------------------------------
| 🌐 Public Routes (No Authentication)
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);


/*
|--------------------------------------------------------------------------
| 🔐 Protected Routes (Sanctum Authentication)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // 🚪 Logout (Common for Admin & User)
    Route::post('/logout', [AuthApiController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | 👤 User Routes (role:user)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:user')->prefix('user')->group(function () {

        // Dashboard example
        Route::get('/data', function () {
            return response()->json([
                'status' => true,
                'role' => 'user',
                'message' => 'Welcome User 👋',
            ]);
        });

        // 📝 Submissions (User side)
        Route::get('/submissions', [SubmissionController::class, 'index']);       // List user submissions
        Route::post('/submissions', [SubmissionController::class, 'store']);      // Create submission
        Route::get('/submissions/{id}', [SubmissionController::class, 'show']);   // View single submission

        // 🔔 Notifications (User side)
        Route::get('/notifications', [NotificationController::class, 'index']);          // User notifications
        Route::put('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);  // Mark read
    });

    /*
    |--------------------------------------------------------------------------
    | 🧑‍💼 Admin Routes (role:admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->prefix('admin')->group(function () {

        // Admin Dashboard info
        Route::get('/data', function () {
            return response()->json([
                'status' => true,
                'role' => 'admin',
                'message' => 'Welcome Admin 🔒',
            ]);
        });

  // Submissions
  Route::get('/admin/submissions', [SubmissionController::class,'adminIndex']);
  Route::put('/admin/submissions/{id}/status', [SubmissionController::class,'updateStatus']);

  // Notifications
  Route::get('/admin/notifications/all', [NotificationController::class,'all']);
  Route::post('/admin/notifications', [NotificationController::class,'store']);
        // Activity Logs
        Route::get('/activities', [ActivityController::class, 'index']);

        // Site Settings
        Route::get('/settings', [SettingController::class, 'index']);  // Fetch settings
        Route::put('/settings', [SettingController::class, 'update']); // Update settings
    });
});
