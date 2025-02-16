<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    /**
     * แสดงฟอร์มลงทะเบียน
     */
    
    public function register()
    {
        return view('auth.register');
    }

    /**
     * จัดการการบันทึกข้อมูลการลงทะเบียน
     */
    public function registerSave(Request $request)
    {
        // ตรวจสอบข้อมูลที่กรอกเข้ามา
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'dob' => 'required|date',

            'password' => 'required|confirmed',
        ]);
   
        // สร้างผู้ใช้ใหม่โดยไม่ใช้ bcrypt
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'dob' => $request->dob,
    
            'password' => $request->password,  // เก็บรหัสผ่านแบบข้อความธรรมดา
        ]);
    
        // เข้าสู่ระบบอัตโนมัติหลังจากลงทะเบียน
        Auth::login($user);
    
        // เปลี่ยนเส้นทางไปยังแดชบอร์ดหรือหน้าหลัก
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
    

    /**
     * แสดงฟอร์มเข้าสู่ระบบ
     */
    public function login()
    {
        return view('auth/login');
    }

    /**
     * จัดการการเข้าสู่ระบบ
     */
    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * จัดการการออกจากระบบ
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
