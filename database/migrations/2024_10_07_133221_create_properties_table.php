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
        Schema::create('properties', function (Blueprint $table) {
            $table->id('property_id');

            // THONG TIN CO BAN
            $table->string('property_type_id');
            $table->string('property_province')->default(''); // tinh/thanh pho
            $table->string('property_district')->default(''); // quan/huyen
            $table->string('property_ward')->default(''); // xa/phuong
            $table->string('property_street')->default('')->nullable();  // duong
            $table->string('property_street_number')->default('')->nullable();  // so nha
            $table->text('property_address');
            $table->string('civil_construction')->default('')->nullable();


            $table->string('property_name');
            $table->string('property_status_id');
            $table->smallInteger('property_purpose_id');
            $table->longText('property_description');
            $table->json('property_image')->nullable();
            $table->json('property_video')->nullable();
            $table->string('property_price');
        
            $table->string('property_seller_id');
            $table->string('property_latitude')->nullable();
            $table->string('property_longitude')->nullable();


            $table->string('property_acreage'); // dien tich
            $table->string('property_legal')->default(''); // phap ly



            // $table->string('property_facade');
            // $table->string('property_depth');
            // $table->string('property_entry');
            // $table->string('property_room');
            // $table->string('property_bath');

            $table->string('active_flg')->default(0);
            $table->string('delete_flg')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
