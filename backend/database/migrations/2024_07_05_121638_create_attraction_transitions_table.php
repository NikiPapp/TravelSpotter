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
        Schema::create('attraction_translations', function (Blueprint $table) {
            $table->id('atrans_id');
            $table->unsignedBigInteger('attraction_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('attraction_name', 100);
            $table->text('attraction_descr');
            $table->timestamps();

            $table->foreign('attraction_id')->references('attraction_id')->on('attractions')->onDelete('cascade');
            $table->foreign('lang_id')->references('lang_id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_transitions');
    }
};
