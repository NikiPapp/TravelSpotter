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
        DB::table('attraction_translations')->insert([
            // Makarska (attraction_id: 1, 2, 3)
            ['atrans_id' => 1, 'attraction_id' => 1, 'lang_id' => 1, 'attraction_name' => 'Makarska Beach', 'attraction_descr' => 'Makarska Beach is a stunning Adriatic Sea beach with clear waters and a pebbly shore.'],
            ['atrans_id' => 2, 'attraction_id' => 1, 'lang_id' => 2, 'attraction_name' => 'Makarska Strand', 'attraction_descr' => 'A Makarska Strand egy lenyűgöző Adriai-tengerpart, tiszta vízzel és kavicsos parttal.'],

            ['atrans_id' => 3, 'attraction_id' => 2, 'lang_id' => 1, 'attraction_name' => 'Biokovo Nature Park', 'attraction_descr' => 'Biokovo Nature Park offers breathtaking views and hiking trails.'],
            ['atrans_id' => 4, 'attraction_id' => 2, 'lang_id' => 2, 'attraction_name' => 'Biokovo Természetvédelmi Park', 'attraction_descr' => 'A Biokovo Természetvédelmi Park lélegzetelállító kilátásokat és túraútvonalakat kínál.'],

            ['atrans_id' => 5, 'attraction_id' => 3, 'lang_id' => 1, 'attraction_name' => 'Makarska Promenade', 'attraction_descr' => 'The Makarska Promenade is lined with palm trees and offers cafes, bars, and boutiques.'],
            ['atrans_id' => 6, 'attraction_id' => 3, 'lang_id' => 2, 'attraction_name' => 'Makarska Sétány', 'attraction_descr' => 'A Makarska Sétányt pálmafák szegélyezik, és kávézókat, bárokat és butikokat kínál.'],

            // Budapest (attraction_id: 4, 5)
            ['atrans_id' => 7, 'attraction_id' => 4, 'lang_id' => 1, 'attraction_name' => 'Fisherman’s Bastion', 'attraction_descr' => 'The Fisherman’s Bastion offers stunning views of Budapest.'],
            ['atrans_id' => 8, 'attraction_id' => 4, 'lang_id' => 2, 'attraction_name' => 'Halászbástya', 'attraction_descr' => 'A Halászbástya gyönyörű kilátást nyújt Budapestre.'],

            ['atrans_id' => 9, 'attraction_id' => 5, 'lang_id' => 1, 'attraction_name' => 'Széchenyi Thermal Bath', 'attraction_descr' => 'The Széchenyi Thermal Bath is one of the largest spa complexes in Europe.'],
            ['atrans_id' => 10, 'attraction_id' => 5, 'lang_id' => 2, 'attraction_name' => 'Széchenyi Gyógyfürdő', 'attraction_descr' => 'A Széchenyi Gyógyfürdő Európa egyik legnagyobb fürdőkomplexuma.'],

            // Trogir (attraction_id: 6, 7, 8)
            ['atrans_id' => 11, 'attraction_id' => 6, 'lang_id' => 1, 'attraction_name' => 'Trogir Cathedral', 'attraction_descr' => 'Trogir Cathedral is a historical landmark with stunning architecture.'],
            ['atrans_id' => 12, 'attraction_id' => 6, 'lang_id' => 2, 'attraction_name' => 'Trogir Katedrális', 'attraction_descr' => 'A Trogir Katedrális történelmi nevezetesség lenyűgöző építészettel.'],

            ['atrans_id' => 13, 'attraction_id' => 7, 'lang_id' => 1, 'attraction_name' => 'Fortress Kamerlengo', 'attraction_descr' => 'Fortress Kamerlengo is located on a small island in Trogir.'],
            ['atrans_id' => 14, 'attraction_id' => 7, 'lang_id' => 2, 'attraction_name' => 'Kamerlengo Erőd', 'attraction_descr' => 'A Kamerlengo Erőd egy kis szigeten található Trogirban.'],

            ['atrans_id' => 15, 'attraction_id' => 8, 'lang_id' => 1, 'attraction_name' => 'St. Lawrence Cathedral', 'attraction_descr' => 'St. Lawrence Cathedral is known for its magnificent portal by Master Radovan.'],
            ['atrans_id' => 16, 'attraction_id' => 8, 'lang_id' => 2, 'attraction_name' => 'Szent Lőrinc Katedrális', 'attraction_descr' => 'A Szent Lőrinc Katedrális Radovan mester csodálatos portáljáról híres.'],

            // Esztergom (attraction_id: 9)
            ['atrans_id' => 17, 'attraction_id' => 9, 'lang_id' => 1, 'attraction_name' => 'Esztergom Basilica', 'attraction_descr' => 'Esztergom Basilica is Hungary’s largest cathedral, inspired by St. Peter’s Basilica in Rome.'],
            ['atrans_id' => 18, 'attraction_id' => 9, 'lang_id' => 2, 'attraction_name' => 'Esztergomi Bazilika', 'attraction_descr' => 'Az Esztergomi Bazilika Magyarország legnagyobb temploma, amelyet a római Szent Péter-bazilika ihletett.'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_transitions');
    }
};
