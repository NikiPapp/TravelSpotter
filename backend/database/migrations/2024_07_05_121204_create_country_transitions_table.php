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
        DB::table('country_transitions')->insert([
            ['CT_id' => 1, 'iso_id' => 'HU', 'lang_id' => 1, 'c_name' => 'Hungary'],
            ['CT_id' => 2, 'iso_id' => 'HU', 'lang_id' => 2, 'c_name' => 'Magyarország'],
            ['CT_id' => 3, 'iso_id' => 'HR', 'lang_id' => 1, 'c_name' => 'Croatia'],
            ['CT_id' => 4, 'iso_id' => 'HR', 'lang_id' => 2, 'c_name' => 'Horvátország'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_transitions');
    }
};
