<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('key', 'is_website_open')->first();
        $isOpen = $setting ? filter_var($setting->value, FILTER_VALIDATE_BOOLEAN) : true;

        return view('admin.settings.index', compact('isOpen'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'is_website_open' => 'required|boolean',
        ]);

        Setting::updateOrCreate(
            ['key' => 'is_website_open'],
            ['value' => $request->is_website_open ? 'true' : 'false']
        );

        $status = $request->is_website_open ? 'dibuka' : 'ditutup';
        return redirect()->route('admin.settings.index')->with('success', "Akses website berhasil $status.");
    }
}
