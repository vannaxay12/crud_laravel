<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    // แสดงข้อมูลโปรไฟล์
    public function show()
    {
        $admin = Auth::user();  // ดึงข้อมูลผู้ใช้ที่ล็อกอิน
        return view('admin.profile', compact('admin'));
    }

    // อัปเดตข้อมูลโปรไฟล์
    public function update(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
        ]);

        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->country = $request->country;
        $admin->city = $request->city;

        $admin->save();

        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully!');
    }

    // อัปเดตรูปโปรไฟล์
    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $admin = Auth::user();

        if ($request->hasFile('profile_image')) {
            // ลบภาพเดิมถ้ามี
            if ($admin->profile_image) {
                Storage::delete($admin->profile_image);
            }

            // อัปโหลดรูปภาพใหม่
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $admin->profile_image = $imagePath;
            $admin->save();
        }

        return redirect()->route('admin.profile.show')->with('success', 'Profile image updated successfully!');
    }

    // ลบรูปโปรไฟล์
    public function deleteImage()
    {
        $admin = Auth::user();

        if ($admin->profile_image) {
            Storage::delete($admin->profile_image);
            $admin->profile_image = null;
            $admin->save();
        }

        return redirect()->route('admin.profile.show')->with('success', 'Profile image deleted successfully!');
    }
}
