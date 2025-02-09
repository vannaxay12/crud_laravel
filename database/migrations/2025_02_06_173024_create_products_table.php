<?php
// Database Migration สำหรับตาราง products
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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // สร้างคอลัมน์ id
            $table->string('name'); // ชื่อผลิตภัณฑ์
            $table->text('description'); // รายละเอียดผลิตภัณฑ์
            $table->decimal('price', 8, 2); // ราคา
            $table->integer('stock_quantity'); // จำนวนสินค้าคงเหลือ
            $table->string('image')->nullable(); // รูปภาพ (อาจไม่ต้องการก็ได้)
            $table->foreignId('category_id')->constrained('categories'); // รหัสประเภทที่อ้างอิงจากตาราง categories
            $table->enum('status', ['available', 'out_of_stock', 'discontinued']); // สถานะผลิตภัณฑ์
            $table->timestamps(); // เวลาที่สร้างและอัพเดท
            $table->integer('stock_quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // ลบตาราง products ถ้า rollback
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('stock_quantity');
        });
    }
};

