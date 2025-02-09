<?php

// Database Migration สำหรับตาราง categories
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // สร้างคอลัมน์ id
            $table->string('name'); // ชื่อประเภท
            $table->timestamps(); // เวลาที่สร้างและอัพเดท
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // ลบตาราง categories ถ้า rollback
        Schema::dropIfExists('categories');
    }
};
