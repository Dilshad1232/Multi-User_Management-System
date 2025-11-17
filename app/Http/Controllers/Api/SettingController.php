<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Activity;

class SettingController extends Controller
{
    /**
     * ⚙️ Get all settings
     */
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return response()->json($settings);
    }

    /**
     * 📝 Update or create settings (Admin only)
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $data = $request->only(['site_title', 'footer_text']);

        // 🖼️ Upload logo if provided
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $path;
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 🧠 Log Activity
        Activity::create([
            'user_id' => $request->user()->id,
            'action' => 'Updated Site Settings',
            'description' => 'Admin updated site configuration settings.'
        ]);

        return response()->json(['message' => 'Settings updated successfully']);
    }
}
