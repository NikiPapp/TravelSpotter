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
        Schema::create('tag_transitions', function (Blueprint $table) {
            $table->increments('TT_id');
            $table->unsignedInteger('tag_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('tag_name', 100);
            $table->timestamps();

            $table->foreign('tag_id')->references('tag_id')->on('tags');
            $table->foreign('lang_id')->references('lang_id')->on('languages');
        });
        DB::table('tag_transitions')->insert([
            // Tagok angol nyelven (lang_id: 1)
            ['TT_id' => 1, 'tag_id' => 1, 'lang_id' => 1, 'tag_name' => 'Family Friendly'],
            ['TT_id' => 2, 'tag_id' => 2, 'lang_id' => 1, 'tag_name' => 'Pet Friendly'],
            ['TT_id' => 3, 'tag_id' => 3, 'lang_id' => 1, 'tag_name' => 'Beachfront'],
            ['TT_id' => 4, 'tag_id' => 4, 'lang_id' => 1, 'tag_name' => 'Historical'],
            ['TT_id' => 5, 'tag_id' => 5, 'lang_id' => 1, 'tag_name' => 'Nature'],
            ['TT_id' => 6, 'tag_id' => 6, 'lang_id' => 1, 'tag_name' => 'Luxury'],
            ['TT_id' => 7, 'tag_id' => 7, 'lang_id' => 1, 'tag_name' => 'Adventure'],
            ['TT_id' => 8, 'tag_id' => 8, 'lang_id' => 1, 'tag_name' => 'Romantic'],
            ['TT_id' => 9, 'tag_id' => 9, 'lang_id' => 1, 'tag_name' => 'Cultural'],
            ['TT_id' => 10, 'tag_id' => 10, 'lang_id' => 1, 'tag_name' => 'Shopping'],

            // Tagok magyar nyelven (lang_id: 2)
            ['TT_id' => 11, 'tag_id' => 1, 'lang_id' => 2, 'tag_name' => 'Gyerekbarát'],
            ['TT_id' => 12, 'tag_id' => 2, 'lang_id' => 2, 'tag_name' => 'Állatbarát'],
            ['TT_id' => 13, 'tag_id' => 3, 'lang_id' => 2, 'tag_name' => 'Tengerparti'],
            ['TT_id' => 14, 'tag_id' => 4, 'lang_id' => 2, 'tag_name' => 'Történelmi'],
            ['TT_id' => 15, 'tag_id' => 5, 'lang_id' => 2, 'tag_name' => 'Természet'],
            ['TT_id' => 16, 'tag_id' => 6, 'lang_id' => 2, 'tag_name' => 'Luxus'],
            ['TT_id' => 17, 'tag_id' => 7, 'lang_id' => 2, 'tag_name' => 'Kaland'],
            ['TT_id' => 18, 'tag_id' => 8, 'lang_id' => 2, 'tag_name' => 'Romantikus'],
            ['TT_id' => 19, 'tag_id' => 9, 'lang_id' => 2, 'tag_name' => 'Kulturális'],
            ['TT_id' => 20, 'tag_id' => 10, 'lang_id' => 2, 'tag_name' => 'Vásárlás'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_transitions');
    }
};
