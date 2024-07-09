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
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('attraction_id')->references('attraction_id')->on('attractions')->onDelete('cascade');
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_tags');
    }
};
