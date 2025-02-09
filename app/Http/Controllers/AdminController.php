<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{// เปลี่ยนชื่อเมธอดใน AdminController
    public function index()
    {
        $users = User::all(); // ดึงข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล
        return view('admin.users.index', compact('users')); // ส่งตัวแปร $users ไปยัง view
    }
    
    

public function login()
{
    return view('admin/login');
}

    public function register()
    {
        return view('admin/register');
    } 
    

    public function AdminregisterSave(Request $request)
    {
        // Validate input fields
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'dob' => 'required|date',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|confirmed',
        ]);
    
        // Handle profile image upload
        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
        }
    
        // Create new admin user without bcrypt
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'dob' => $request->dob,
            'profile_image' => $profileImagePath,
            'password' => $request->password,  // ไม่ใช้ bcrypt
            'level' => 'Admin'
        ]);
    
        return redirect()->route('Adminlogin')->with('success', 'Admin registered successfully!');
    }
    
    
 // เมธอดประมวลผลการล็อกอิน
 public function create()
 {
     return view('admin.users.create'); // ฟอร์มสร้างผู้ใช้ใหม่
 }
 public function store(Request $request)
 {
     // ตรวจสอบข้อมูลที่กรอกเข้ามา
     $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|confirmed',
     ]);

     // สร้างผู้ใช้ใหม่
     User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => $request->password, // เข้ารหัสรหัสผ่าน
     ]);
    
        return redirect()->route('admin.users')->with('success', 'Admin created successfully');
    }
    public function destroy($id)
{
    $user = User::findOrFail($id);  // ค้นหาผู้ใช้ตาม ID ที่รับมา
    $user->delete();  // ลบผู้ใช้

    return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
}

    
public function update(Request $request, $id)
{
    // ตรวจสอบข้อมูลที่กรอกเข้ามา
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
    ]);

    $user = User::findOrFail($id); // ค้นหาผู้ใช้ตาม ID และอัปเดต
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password , // เข้ารหัสรหัสผ่านใหม่ถ้ามี
    ]);

    // เปลี่ยนเส้นทางไปยังหน้าผู้ใช้ทั้งหมดพร้อมข้อความ
    return redirect()->route('admin.users')->with('success', 'User updated successfully!');
}
    
}