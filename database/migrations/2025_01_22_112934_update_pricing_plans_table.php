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
        Schema::table('pricing_plans', function (Blueprint $table) {
            $table->float('daily_fee')->nullable();
            $table->float('weekly_fee')->nullable();
            $table->float('monthly_fee')->nullable();
            $table->string('color')->nullable();
            $table->tinyInteger('phone_display')->default(INACTIVE);
            $table->tinyInteger('auto_approve')->default(ACTIVE);
            $table->tinyInteger('font_type')->default(NORMAL_FONT);

            $table->tinyInteger('active_flg')->default(ACTIVE);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pricing_plans', function (Blueprint $table) {
            $table->dropColumn('daily_fee');
            $table->dropColumn('weekly_fee');
            $table->dropColumn('monthly_fee');
            $table->dropColumn('color');
            $table->dropColumn('font_type');
            $table->dropColumn('phone_display');
            $table->dropColumn('auto_approve');
            $table->dropColumn('active_flg');
        });
    }
};
