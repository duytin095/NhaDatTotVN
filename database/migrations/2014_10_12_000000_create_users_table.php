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
            $table->id('user_id');
            $table->string('user_name')->default('');
            $table->longText('user_avatar')->nullable();
            $table->string('user_phone')->unique()->nullable();
            $table->string('user_email')->unique();
            $table->string('password');
            $table->string('owner_referral_code')->unique();
            $table->string('referral_code')->nullable();
            
            $table->string('slug')->unique();

            $table->string('active_flg')->default(0);
            $table->string('delete_flg')->default(0);
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
