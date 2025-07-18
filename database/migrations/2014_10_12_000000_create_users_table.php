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
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->text('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('shop_name')->nullable();
            $table->text('banner')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('x_link')->nullable();
            $table->string('insta_link')->nullable();


            $table->enum('role', ['admin', 'vendor', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('vendor_status')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
