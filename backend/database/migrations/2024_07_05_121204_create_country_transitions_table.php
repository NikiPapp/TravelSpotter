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
        Schema::create('country_transitions', function (Blueprint $table) {
            $table->id('CT_id');
            $table->string('iso_id', 3);
            $table->unsignedBigInteger('lang_id');
            $table->string('c_name', 100);
            $table->timestamps();

            $table->foreign('iso_id')->references('iso_id')->on('countries')->onDelete('cascade');
            $table->foreign('lang_id')->references('lang_id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_transitions');
    }
};
