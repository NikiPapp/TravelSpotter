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
        Schema::create('settlements', function (Blueprint $table) {
            $table->id('s_id');
            $table->string('iso_id', 3);
            $table->timestamps();

            $table->foreign('iso_id')->references('iso_id')->on('countries')->onDelete('cascade');
        });
        DB::table('settlements')->insert([
            ['s_id' => 1, 'iso_id' => 'HU'],
            ['s_id' => 2, 'iso_id' => 'HR'],
            ['s_id' => 3, 'iso_id' => 'HR'],
            ['s_id' => 4, 'iso_id' => 'HU'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};
