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
            $table->string('property_province');           // tinh/thanh pho
            $table->string('property_district');           // quan/huyen
            $table->string('property_ward');               // xa/phuong

            $table->string('property_street')->nullable();              // duong
            $table->string('property_address_number')->nullable();      // so nha
            $table->text('property_address')->nullable();               // dia chi chinh xac
            $table->string('construction')->nullable();                 // du an
            $table->mediumInteger('property_facade')->nullable();       // mat tien
            $table->mediumInteger('property_depth')->nullable();        // chieu rong/sau
            $table->mediumInteger('property_acreage')->nullable();      // dien tich
            $table->smallInteger('property_direction')->nullable();   // huong nha
            $table->smallInteger('property_legal')->nullable();         // phap ly
            $table->smallInteger('property_status')->nullable();        // tinh trang
            $table->mediumInteger('property_price')->default(0);        // gia tien - gia tri cua mediumInt https://dev.to/kakisoft/laravel-mysql-columntype-is-set-to-int-11-even-though-the-size-of-int-was-specified-59pj

            // BAN DO
            $table->string('property_latitude')->nullable();
            $table->string('property_longitude')->nullable();

            // THONG TIN MO TA
            $table->string('property_name');
            $table->longText('property_description');
            $table->json('property_image')->nullable();
            

            // THONG TIN THEM
            $table->smallInteger('property_bedroom')->default(0)->nullable();       // phong ngu
            $table->smallInteger('property_floor')->default(0)->nullable();          // so tang
            $table->smallInteger('property_bathroom')->default(0)->nullable();      // phong tam
            $table->mediumInteger('property_entry')->default(0)->nullable();        // duong vao
            $table->text('property_video_link')->nullable(); 
            $table->tinyInteger('property_video_type')->nullable()->default(0); 

            // AUTO SAVE
            $table->string('property_seller_id');
            $table->string('slug')->unique();
            $table->tinyInteger('property_label');

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
