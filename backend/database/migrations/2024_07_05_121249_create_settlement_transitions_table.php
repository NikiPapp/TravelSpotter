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
        Schema::create('settlement_transitions', function (Blueprint $table) {
            $table->id('STrans_id');
            $table->unsignedBigInteger('s_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('s_name', 100);
            $table->text('s_descr');
            $table->timestamps();

            $table->foreign('s_id')->references('s_id')->on('settlements')->onDelete('cascade');
            $table->foreign('lang_id')->references('lang_id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlement_transitions');
    }
};
