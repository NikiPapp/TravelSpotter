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
        Schema::create('images', function (Blueprint $table) {
            $table->id('image_id');
            $table->unsignedBigInteger('s_id');
            $table->unsignedBigInteger('attraction_id')->nullable();
            $table->string('image_path');
            $table->timestamps();

            $table->foreign('s_id')->references('s_id')->on('settlements')->onDelete('cascade');
            $table->foreign('attraction_id')->references('attraction_id')->on('attractions')->onDelete('cascade');
        });

        
        DB::table('images')->insert([
            [
                's_id' => 1,
                'attraction_id' => null,
                'image_path' => 'images/budapest1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                's_id' => 2,
                'attraction_id' => 6,
                'image_path' => 'images/trogir1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
