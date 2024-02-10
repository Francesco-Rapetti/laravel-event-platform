<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function () {
    $utenti = \App\Models\User::all();
    return response()->json($utenti);
});

Route::get('/events', function () {
    $eventi = \App\Models\Event::all();
    return response()->json($eventi);
});

Route::get('/tags', function () {
    $tags = \App\Models\Tag::all();
    return response()->json($tags);
});
