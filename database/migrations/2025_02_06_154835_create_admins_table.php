<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->date('dob')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('password');
            $table->string('level')->default('Admin');
            $table->timestamps();
        });
    }        
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
