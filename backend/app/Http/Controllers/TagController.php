<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagTransition;
use App\Models\Settlement;
use Illuminate\Support\Facades\Log;

    class TagController extends Controller
{
    public function allTagsWithEntities()
    {
        try {
          
            $tags = TagTransition::with(['settlements.translations', 'attractions.translations'])->get();
    
            
            $data = $tags->map(function($tag) {
                $settlements = $tag->settlements->map(function($settlement) {
                    return optional($settlement->translations->first())->s_name;
                })->filter()->all();
    
                $attractions = $tag->attractions->map(function($attraction) {
                    return optional($attraction->translations->first())->a_name;
                })->filter()->all();
    
                return [
                    'tag_name' => $tag->tag_name,
                    'settlements' => $settlements,
                    'attractions' => $attractions,
                ];
            });
    
            return response()->json($data, 200);
        } catch (\Exception $e) {
            Log::error('Error fetching tags with entities: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching data.'], 500);
        }
}
}