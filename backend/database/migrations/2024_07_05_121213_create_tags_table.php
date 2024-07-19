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
       
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('tag_id');
            $table->timestamps();
        });
        DB::table('tags')->insert([
            ['tag_id' => 1],
            ['tag_id' => 2],
            ['tag_id' => 3],
            ['tag_id' => 4],
            ['tag_id' => 5],
            ['tag_id' => 6],
            ['tag_id' => 7],
            ['tag_id' => 8],
            ['tag_id' => 9],
            ['tag_id' => 10],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
