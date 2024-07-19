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
        Schema::create('countries', function (Blueprint $table) {
            $table->string('iso_id', 3)->primary();
            $table->string('def_name', 100);
            $table->timestamps();
        });
        DB::table('countries')->insert([
            ['iso_id' => 'HU', 'def_name' => 'Hungary'],
            ['iso_id' => 'HR', 'def_name' => 'Croatia'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
