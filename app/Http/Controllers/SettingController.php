<?php
namespace App\Http\Controllers;


use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $user = Auth::user();

        return view('settings.index', compact('setting', 'user'));
    }

    // ✅ Farm + System settings
    // public function updateSystem(Request $request)
    // {
    //     $setting = Setting::first() ?? new Setting();

    //     // Handle logo upload
    //     if ($request->hasFile('logo')) {
    //         $path = $request->file('logo')->store('logos', 'public');
    //         $setting->logo = $path;
    //     }

    //     $setting->update([
    //         'farm_name' => $request->farm_name,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'currency' => $request->currency,
    //         'rows_per_page' => $request->rows_per_page,
    //     ]);

    //     return back()->with('success', 'Settings updated');
    // }

    public function updateSystem(Request $request)
{
    $setting = \App\Models\Setting::first();

    if (!$setting) {
        $setting = new \App\Models\Setting();
    }

    // Handle logo
    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('logos', 'public');
        $setting->logo = $path;
    }

    $setting->farm_name = $request->farm_name;
    $setting->address = $request->address;
    $setting->phone = $request->phone;
    $setting->theme = $request->theme ?? 'light';

    $setting->save();

    return back()->with('success', 'Settings updated successfully');
}

    // ✅ User profile update
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Password update (optional)
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return back()->with('success', 'Profile updated');
    }
}