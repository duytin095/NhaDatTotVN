<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->after('user_email');
        });

        DB::statement('UPDATE users SET email = user_email');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_email')->after('email');
        });

        DB::statement('UPDATE users SET user_email = email');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
};
