<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
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
    
    

public function Adminlogin()
{
    return view('admin/login');
}


    public function Adminregister()
    {
        return view('admin/register');
    } 

    public function AdminregisterSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'dob' => 'required|date',

            'password' => 'required|confirmed',
        ]);
    
      
    
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'dob' => $request->dob,
         
            'password' => $request->password,  // Hash the password
            'level' => 'Admin'
        ]);
    
        return redirect()->route('Adminlogin')->with('success', 'Admin registered successfully!');
    }
    


    public function AdminloginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ใช้ Auth แบบกำหนดเองที่ไม่ได้ใช้งาน config/auth.php
        $admin = Admin::where('email', $request->email)->first();
        
        if ($admin && $admin->password == $request->password) {  // ควรใช้ bcrypt() หรือ hash() ในการตรวจสอบรหัสผ่าน
            Auth::login($admin);  // เข้าสู่ระบบ
            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
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