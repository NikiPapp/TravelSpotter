<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settlement;
use App\Models\SettlementTransition;
use App\Models\TagTransition;
use App\Models\Image;
use App\Models\SettlementTag;


class SettlementController extends Controller
{
    public function show($s_id)
    {
        $city = Settlement::with(['translations', 'tags', 'images', 'attractions.translations', 'attractions.tags'])->findOrFail($s_id);
        return response()->json($city);
    }
   
}
