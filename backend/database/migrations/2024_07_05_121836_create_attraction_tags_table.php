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
        Schema::create('attraction_tags', function (Blueprint $table) {
            $table->id('at_id');
            $table->unsignedBigInteger('attraction_id');
            $table->unsignedInteger('TT_id');
            $table->timestamps();

            $table->foreign('attraction_id')->references('attraction_id')->on('attractions')->onDelete('cascade');
            $table->foreign('TT_id')->references('TT_id')->on('tag_transitions')->onDelete('cascade');
        });
        DB::table('attraction_tags')->insert([
            // Makarska attractions (attraction_id: 1, 2, 3)
            ['attraction_id' => 1, 'TT_id' => 3], // Beachfront
            ['attraction_id' => 1, 'TT_id' => 5], // Nature
            ['attraction_id' => 2, 'TT_id' => 8], // Romantic
            ['attraction_id' => 3, 'TT_id' => 7], // Adventure

            // Budapest attractions (attraction_id: 4, 5)
            ['attraction_id' => 4, 'TT_id' => 1], // Family Friendly
            ['attraction_id' => 4, 'TT_id' => 4], // Historical
            ['attraction_id' => 5, 'TT_id' => 9], // Cultural

            // Trogir attractions (attraction_id: 6, 7, 8)
            ['attraction_id' => 6, 'TT_id' => 3], // Beachfront
            ['attraction_id' => 7, 'TT_id' => 4], // Historical
            ['attraction_id' => 8, 'TT_id' => 7], // Adventure

            // Esztergom attractions (attraction_id: 9)
            ['attraction_id' => 9, 'TT_id' => 4], // Historical
            ['attraction_id' => 9, 'TT_id' => 9], // Cultural
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_tags');
    }
};
