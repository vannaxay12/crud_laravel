<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // กำหนดให้กรอกข้อมูลได้จาก array
    protected $fillable = ['name'];

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);  // สร้างความสัมพันธ์ One-to-Many
    }
}
