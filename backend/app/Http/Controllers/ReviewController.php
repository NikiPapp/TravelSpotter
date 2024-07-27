<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\SettlementTransition;
use App\Models\AttractionTransition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function reviews(Request $request)
    {
        $s_id = $request->query('s_id');
        $attraction_id = $request->query('attraction_id');

        Log::info('Request received for reviews', [
            's_id' => $s_id,
            'attraction_id' => $attraction_id
        ]);

        if (!$s_id && !$attraction_id) {
            Log::error('No s_id or attraction_id provided');
            return response()->json(['message' => 'Please provide s_id or attraction_id'], 400);
        }

        // Fetch reviews based on the provided s_id or attraction_id
        $reviews = Review::query()
            ->when($s_id, function ($query, $s_id) {
                return $query->where('s_id', $s_id);
            })
            ->when($attraction_id, function ($query, $attraction_id) {
                return $query->where('attraction_id', $attraction_id);
            })
            ->get();

        if ($reviews->isEmpty()) {
            Log::info('No reviews found', [
                's_id' => $s_id,
                'attraction_id' => $attraction_id
            ]);
            return response()->json(['message' => 'No reviews found'], 404);
        }

        // Calculate the average rating
        $averageRating = $reviews->avg('nbOfStars');

        // Fetch the settlement name if s_id is provided
        $settlementName = null;
        if ($s_id) {
            $settlementTransition = SettlementTransition::where('s_id', $s_id)
                ->where('lang_id', 1) // Adjust if needed for default language or current language
                ->first();
            $settlementName = $settlementTransition ? $settlementTransition->s_name : 'Unknown City';
        }

        // Fetch the attraction name if attraction_id is provided
        $attractionName = null;
        if ($attraction_id) {
            $attractionTransition = AttractionTransition::where('attraction_id', $attraction_id)
                ->where('lang_id', 1) // Adjust if needed for default language or current language
                ->first();
            $attractionName = $attractionTransition ? $attractionTransition->attraction_name : 'Unknown Attraction';
        }

        // Format the reviews data
        $formattedReviews = $reviews->map(function($review) {
            return [
                'user' => $review->user_name ?: 'Anonymos',
                'rating' => $review->nbOfStars,
                'comment' => $review->review_text
            ];
        });

        $result = [
            'settlement' => $settlementName,
            'attraction' => $attractionName,
            'averageRating' => round($averageRating, 1),
            'reviews' => $formattedReviews
        ];

        Log::info('Response data', ['data' => $result]);

        return response()->json($result);
    }
}