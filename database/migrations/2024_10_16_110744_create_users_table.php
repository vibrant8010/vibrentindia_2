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
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('mobileno', 10);
            $table->string('address', 225)->nullable();
            $table->string('streetaddress', 225)->nullable();
            $table->string('cityname', 225)->nullable();
            $table->string('longitude', 225)->nullable();
            $table->string('latitude', 225)->nullable();
            $table->integer('pincode', 20)->nullable();
            $table->text('role')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('remember_token', 100)->nullable();
            $table->string('password_reset_token', 64)->nullable();
            $table->bigInteger('password_reset_expiry')->nullable()->unsigned();
            $table->timestamps();
            $table->string('otp', 10)->nullable();
            $table->string('otp_expiry', 10)->nullable();
            $table->enum('is_otp_verified', ['0', '1'])->default('0');
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
