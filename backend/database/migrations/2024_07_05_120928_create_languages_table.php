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
        Schema::create('languages', function (Blueprint $table) {
            $table->id('lang_id');
            $table->string('code', 10);
            $table->string('lang_name', 50);
            $table->timestamps();
        });
        DB::table('languages')->insert([
            ['lang_id' => 1, 'code' => 'en', 'lang_name' => 'English'],
            ['lang_id' => 2, 'code' => 'hu', 'lang_name' => 'Hungarian'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
