<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),



    //     ]);

    //     // Default role
    //     $user->assignRole('user');

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect()->route('user.dashboard');
    // }
// Controller: store function
public function store(Request $request): RedirectResponse
{
    $request->validate([
        'full_name'     => ['required', 'string', 'max:255'],
        'father_name'   => ['required', 'string', 'max:255'],
        'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'mobile_no'     => ['required', 'digits:10'],
        'password'      => ['required', 'confirmed'],
        'address'       => ['required', 'string'],
        'district'      => ['required', 'string'],
        'pin_code'      => ['required', 'digits:6'],
        'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    // Profile photo upload
    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $original = $file->getClientOriginalName();

        // Destination folder: public/profiles
        $destinationPath = public_path('profiles');

        // Ensure folder exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Move file directly to public folder
        $file->move($destinationPath, $original);

        $filename = $original; // save in DB
    }

    // Create user
    $user = User::create([
        'full_name'     => $request->full_name,
        'father_name'   => $request->father_name,
        'email'         => $request->email,
        'mobile_no'     => $request->mobile_no,
        'password'      => Hash::make($request->password),
        'show_password' => $request->password,
        'address'       => $request->address,
        'district'      => $request->district,
        'pin_code'      => $request->pin_code,
        'profile_photo' => $filename,  // original name
    ]);

    $user->assignRole('user');  // default role

    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('user.dashboard')->with('success', 'Registration Successful!');
}


public function edit()
{
    return view('user.profile-edit', [
        'user' => Auth::user()
    ]);
}

public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'full_name'     => 'required|string|max:255',
        'father_name'   => 'nullable|string|max:255',
        'email'         => 'required|email',
        'mobile_no'     => 'required|digits:10',
        'address'       => 'nullable|string',
        'district'      => 'nullable|string',
        'pin_code'      => 'nullable|digits:6',
        'profile_photo' => 'nullable|image|max:2048',
    ]);

    // ================================
    // 🔥 OLD PROFILE PHOTO DELETE CODE
    // ================================
    if ($request->hasFile('profile_photo')) {

        // DELETE OLD PHOTO
        if ($user->profile_photo && file_exists(public_path('profiles/' . $user->profile_photo))) {
            unlink(public_path('profiles/' . $user->profile_photo));
        }

        // UPLOAD NEW PHOTO WITH ORIGINAL NAME
        $file = $request->file('profile_photo');
        $originalName = $file->getClientOriginalName(); // original name
        $file->move(public_path('profiles'), $originalName);

        // save original filename in database
        $user->profile_photo = $originalName;
    }

    // update other fields
    $user->full_name   = $request->full_name;
    $user->father_name = $request->father_name;
    $user->email       = $request->email;
    $user->mobile_no   = $request->mobile_no;
    $user->address     = $request->address;
    $user->district    = $request->district;
    $user->pin_code    = $request->pin_code;

    $user->save();
    $user->update($request->except('profile_photo'));
    return redirect()->route('user.profile.edit')->with('success', 'Profile Updated Successfully!');

    // ================================




}

}
