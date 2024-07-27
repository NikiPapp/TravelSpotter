<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
    public function byCity($s_id)
    {
        $attractions = Attraction::where('s_id', $s_id)->with('translations')->get();
        return response()->json($attractions);
    }
}