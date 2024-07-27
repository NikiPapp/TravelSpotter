<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ReviewController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/cities/{s_id}', [SettlementController::class, 'show']);
Route::get('/countries/{iso_id}/cities', [CountryController::class, 'cities']);
Route::get('/cities/{s_id}/attractions', [AttractionController::class, 'byCity']);
Route::get('/tags-with-entities', [TagController::class, 'allTagsWithEntities']);
Route::get('/reviews', [ReviewController::class, 'reviews']);