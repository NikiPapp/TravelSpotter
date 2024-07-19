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
        DB::table('settlement_transitions')->insert([
            ['STrans_id' => 1, 's_id' => 1, 'lang_id' => 1, 's_name' => 'Budapest', 's_descr' => ' Budapest, the capital of Hungary, is situated on the banks of the Danube River. It boasts impressive landmarks and attractions. The Fisherman’s Bastion offers stunning views of the city, while the thermal baths provide relaxation. Budapest is rich in historical and cultural heritage .'],
            ['STrans_id' => 2, 's_id' => 1, 'lang_id' => 2, 's_name' => 'Budapest', 's_descr' => 'Budapest, Magyarország fővárosa, a Duna partján fekszik, és lenyűgöző látnivalókkal várja az ide látogatókat. A Halászbástya gyönyörű kilátást nyújt a városra, a termálfürdők pedig kikapcsolódást ígérnek. A város gazdag történelmi és kulturális örökséggel rendelkezik.'],
            ['STrans_id' => 3, 's_id' => 2, 'lang_id' => 1, 's_name' => 'Trogir', 's_descr' => 'Trogir is a historic town and port in Croatia. Its Venetian-style architecture has earned it a place on the UNESCO World Heritage list since 1997. The town is situated between the Croatian mainland and the island of Čiovo, just 27 kilometers from Split. Notable attractions include the Trogir Cathedral and the fortress located on a small island. '],
            ['STrans_id' => 4, 's_id' => 2, 'lang_id' => 2, 's_name' => 'Trogir', 's_descr' => 'Trogir egy történelmi város és kikötő Horvátországban. Velencei stílusú építészete miatt az UNESCO Világörökség része. A város a Split városától mindössze 27 kilométerre található. Látványosságai közé tartozik a Trogir-katedrális és a kis szigeten álló erődítmény. '],
            ['STrans_id' => 5, 's_id' => 3, 'lang_id' => 1, 's_name' => 'Makarska', 's_descr' => 'Makarska, the picturesque Croatian coastal town, lies between the Biokovo Mountains and the Adriatic Sea. Its palm-lined promenade features cafés, bars, and boutiques overlooking the harbor. The town’s small size and flat terrain make it easily walkable.  '],
            ['STrans_id' => 6, 's_id' => 3, 'lang_id' => 2, 's_name' => 'Makarska', 's_descr' => 'Makarska, a meseszép horvát tengerparti város, a Biokovo-hegység és az Adriai-tenger között fekszik. A pálmafákkal szegélyezett sétányon kávézók, bárok és butikok találhatók, melyek a kikötőre néznek. A város kis mérete és sík tere teszi könnyen bejárhatóvá. '],
            ['STrans_id' => 7, 's_id' => 4, 'lang_id' => 1, 's_name' => 'Esztergom', 's_descr' => 'Esztergom, situated on the banks of the Danube River, is a historic city in Hungary. It is home to Hungary’s largest cathedral, inspired by the Basilica of St. Peter in Rome. The city also boasts several museums, including the Christian Museum and the Castle Museum '],
            ['STrans_id' => 8, 's_id' => 4, 'lang_id' => 2, 's_name' => 'Esztergom', 's_descr' => 'Esztergom, a Duna partján fekvő történelmi város Magyarországon. Itt található Magyarország legnagyobb temploma, amelyet Rómában található Szent Péter-bazilika ihletett. A városban több múzeum is működik, például a Keresztény Múzeum és a Vár Múzeum. '],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlement_transitions');
    }
};
