<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $eventi = \App\Models\Event::all();
        return response()->json([
            "success" => true,
            "results" => $eventi
        ]);
    }
}
