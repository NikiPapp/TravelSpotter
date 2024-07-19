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
        Schema::create('attractions', function (Blueprint $table) {
            $table->id('attraction_id');
            $table->unsignedBigInteger('s_id');
            $table->timestamps();

            $table->foreign('s_id')->references('s_id')->on('settlements')->onDelete('cascade');
        });
        DB::table('attractions')->insert([
            /**
                * Makarska
            */
            ['attraction_id' => 1, 's_id' => '3'],
            ['attraction_id' => 2, 's_id' => '3'],
            ['attraction_id' => 3, 's_id' => '3'],

             /**
                * Budapest
            */
            ['attraction_id' => 4, 's_id' => '1'],
            ['attraction_id' => 5, 's_id' => '1'],

             /**
                * Trogir
            */
            ['attraction_id' => 6, 's_id' => '2'],
            ['attraction_id' => 7, 's_id' => '2'],
            ['attraction_id' => 8, 's_id' => '2'],

             /**
                * Esztergom
            */
            ['attraction_id' => 9, 's_id' => '4'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};
