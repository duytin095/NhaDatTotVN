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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_address')->nullable();
            $table->tinyInteger('province')->nullable();
            $table->mediumInteger('district')->nullable();
            $table->mediumInteger('ward')->nullable();
            $table->longText('user_introduction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_address');
            $table->dropColumn('province');
            $table->dropColumn('district');
            $table->dropColumn('ward');
            $table->dropColumn('user_introduction');
        });
    }
};
