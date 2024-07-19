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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->unsignedBigInteger('s_id');
            $table->unsignedBigInteger('attraction_id')->nullable();
            $table->string('user_name')->nullable();
            $table->text('review_text');
            $table->timestamp('review_date')->nullable();
            $table->timestamps();

            $table->foreign('s_id')->references('s_id')->on('settlements')->onDelete('cascade');
            $table->foreign('attraction_id')->references('attraction_id')->on('attractions')->onDelete('cascade');
        });
        DB::table('reviews')->insert([
            // Reviews for settlements (s_id: 1 - Budapest)
            [
                's_id' => 1,
                'attraction_id' => null,
                'user_name' => 'John Doe',
                'review_text' => 'Budapest is a beautiful city with a rich history. The Fisherman\'s Bastion offers a stunning view of the city.',
                'review_date' => now(),
            ],
            [
                's_id' => 1,
                'attraction_id' => null,
                'user_name' => 'Jane Smith',
                'review_text' => 'I loved the thermal baths in Budapest. They were very relaxing after a long day of sightseeing.',
                'review_date' => now(),
            ],
            // Reviews for attractions in Budapest (s_id: 1, attraction_id: 4, 5)
            [
                's_id' => 1,
                'attraction_id' => 4,
                'user_name' => 'Alice Brown',
                'review_text' => 'The Fisherman\'s Bastion is a must-see in Budapest. The views are incredible!',
                'review_date' => now(),
            ],
            [
                's_id' => 1,
                'attraction_id' => 5,
                'user_name' => 'Bob Johnson',
                'review_text' => 'The Buda Castle is magnificent. I enjoyed the historical exhibits inside.',
                'review_date' => now(),
            ],
            // Reviews for settlements (s_id: 2 - Trogir)
            [
                's_id' => 2,
                'attraction_id' => null,
                'user_name' => 'Chris Evans',
                'review_text' => 'Trogir is a charming town with a lot of character. The old town is like a step back in time.',
                'review_date' => now(),
            ],
            // Reviews for attractions in Trogir (s_id: 2, attraction_id: 6, 7, 8)
            [
                's_id' => 2,
                'attraction_id' => 6,
                'user_name' => 'Emily Clark',
                'review_text' => 'The Trogir Cathedral is stunning. The architecture is very impressive.',
                'review_date' => now(),
            ],
            [
                's_id' => 2,
                'attraction_id' => 7,
                'user_name' => 'David Wilson',
                'review_text' => 'The Kamerlengo Fortress offers a great view of the town. Worth the climb!',
                'review_date' => now(),
            ],
            [
                's_id' => 2,
                'attraction_id' => 8,
                'user_name' => 'Linda Martinez',
                'review_text' => 'The promenade in Trogir is lovely. Great place for a stroll by the sea.',
                'review_date' => now(),
            ],
            // Reviews for settlements (s_id: 3 - Makarska)
            [
                's_id' => 3,
                'attraction_id' => null,
                'user_name' => 'Michael Lee',
                'review_text' => 'Makarska is a perfect beach destination. The scenery is breathtaking.',
                'review_date' => now(),
            ],
            // Reviews for attractions in Makarska (s_id: 3, attraction_id: 1, 2, 3)
            [
                's_id' => 3,
                'attraction_id' => 1,
                'user_name' => 'Sarah Green',
                'review_text' => 'The Makarska Beach is beautiful and clean. Great place to relax.',
                'review_date' => now(),
            ],
            [
                's_id' => 3,
                'attraction_id' => 2,
                'user_name' => 'Tom Hanks',
                'review_text' => 'The Biokovo Nature Park offers amazing hiking trails with stunning views.',
                'review_date' => now(),
            ],
            [
                's_id' => 3,
                'attraction_id' => 3,
                'user_name' => 'Jessica Parker',
                'review_text' => 'The Makarska Riviera is gorgeous. Crystal clear water and beautiful beaches.',
                'review_date' => now(),
            ],
            // Reviews for settlements (s_id: 4 - Esztergom)
            [
                's_id' => 4,
                'attraction_id' => null,
                'user_name' => 'Paul Walker',
                'review_text' => 'Esztergom is a city full of history. The Basilica is a must-visit.',
                'review_date' => now(),
            ],
            // Reviews for attractions in Esztergom (s_id: 4, attraction_id: 9)
            [
                's_id' => 4,
                'attraction_id' => 9,
                'user_name' => 'Anna Scott',
                'review_text' => 'The Esztergom Basilica is breathtaking. The view from the dome is fantastic.',
                'review_date' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
