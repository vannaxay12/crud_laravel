<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // ชื่อผู้ใช้
            $table->string('email')->unique();  // อีเมลต้องไม่ซ้ำกัน
            $table->string('phone')->nullable();  // เบอร์โทรศัพท์ (สามารถเว้นว่างได้)
            $table->string('country')->nullable();  // ประเทศ
            $table->string('city')->nullable();  // เมือง
            $table->date('dob')->nullable();  // วันเกิด
            $table->string('profile_image')->nullable();  // รูปโปรไฟล์
            $table->timestamp('email_verified_at')->nullable();  // เวลายืนยันอีเมล
            $table->string('password');  // รหัสผ่าน
            $table->rememberToken();  // Token สำหรับการจำล็อกอิน
            $table->timestamps();  // created_at และ updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
