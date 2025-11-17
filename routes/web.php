<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\User\UserDasboardController;
use App\Http\Controllers\Api\User\UserSubmissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\API\NotificationController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/features', [HomeController::class, 'features'])->name('features');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('redirect.if.authenticated')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/store', [RegisteredUserController::class, 'store'])->name('store');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);


});


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'admindashboard'])
        ->name('admin.dashboard');

    Route::get('/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::get('/submissions', [DashboardController::class, 'submissions'])->name('admin.submissions');

    Route::patch('/submissions/{id}/approve', [DashboardController::class, 'approveSubmission'])
        ->name('admin.submissions.approve');

    Route::patch('/submissions/{id}/reject', [DashboardController::class, 'rejectSubmission'])
        ->name('admin.submissions.reject');

    Route::get('/activities', [DashboardController::class, 'activities'])->name('admin.activities');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('admin.settings');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {

    Route::get('/dashboard', [UserDasboardController::class, 'dashboard'])
        ->name('user.dashboard');

    Route::get('/submission', [UserSubmissionController::class, 'create'])->name('user.submission');
    Route::post('/submission', [UserSubmissionController::class, 'store'])->name('user.submission.store');

    Route::get('/track-submissions', [UserSubmissionController::class, 'track'])->name('user.track-submissions');
    Route::get('/notification', [UserSubmissionController::class, 'notification'])->name('user.notification');
    Route::get('/profile', [UserDasboardController::class, 'profile'])->name('user.profile');

    Route::get('/profile/edit', [RegisteredUserController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profile/update', [RegisteredUserController::class, 'update'])->name('user.profile.update');

});




// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/notifications', [NotificationController::class, 'index']);
//     Route::post('/notifications', [NotificationController::class, 'store']); // Admin
//     Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
// });
