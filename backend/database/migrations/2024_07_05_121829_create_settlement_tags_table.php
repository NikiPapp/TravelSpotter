<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('settlement_tags', function (Blueprint $table) {
            $table->id('st_id');
            $table->unsignedBigInteger('s_id');
            $table->unsignedInteger('TT_id');
            $table->timestamps();

            $table->foreign('s_id')->references('s_id')->on('settlements')->onDelete('cascade');
            $table->foreign('TT_id')->references('TT_id')->on('tag_transitions')->onDelete('cascade');
        });
        DB::table('settlement_tags')->insert([
            // Budapest (s_id: 1)
            ['s_id' => 1, 'TT_id' => 1], // Family Friendly
            ['s_id' => 1, 'TT_id' => 4], // Historical
            ['s_id' => 1, 'TT_id' => 9], // Cultural
            ['s_id' => 1, 'TT_id' => 10], // Shopping

            // Trogir (s_id: 2)
            ['s_id' => 2, 'TT_id' => 3], // Beachfront
            ['s_id' => 2, 'TT_id' => 4], // Historical
            ['s_id' => 2, 'TT_id' => 7], // Adventure

            // Makarska (s_id: 3)
            ['s_id' => 3, 'TT_id' => 3], // Beachfront
            ['s_id' => 3, 'TT_id' => 5], // Nature
            ['s_id' => 3, 'TT_id' => 8], // Romantic

            // Esztergom (s_id: 4)
            ['s_id' => 4, 'TT_id' => 1], // Family Friendly
            ['s_id' => 4, 'TT_id' => 4], // Historical
            ['s_id' => 4, 'TT_id' => 9], // Cultural
        ]);
    }

   
    public function down(): void
    {
        Schema::dropIfExists('settlement_tags');
    }
};
