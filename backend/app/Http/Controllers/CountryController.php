<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settlement;
use App\Models\SettlementTransition;

class CountryController extends Controller
{
    public function cities($iso_id)
    {
        $cities = Settlement::where('iso_id', $iso_id)->with('translations')->get(['s_id']);
        return response()->json($cities);
    }
}