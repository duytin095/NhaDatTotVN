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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('admin_name')->nullable();
            $table->string('admin_phone')->unique()->nullable();
            $table->string('admin_zalo')->unique()->nullable();
            $table->string('admin_avatar')->nullable();
            $table->string('admin_email')->unique();
            $table->string('password');
            $table->string('admin_address1')->nullable();
            $table->string('admin_address2')->nullable();
            $table->string('admin_address3')->nullable();
            $table->dateTime('admin_login_at')->nullable();
            $table->tinyInteger('admin_kind')->default(0);
            $table->tinyInteger('admin_delete_flg')->default(0);
            $table->tinyInteger('admin_active_flg')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
