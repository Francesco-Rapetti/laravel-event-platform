<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $eventi = \App\Models\Event::with(['user', 'tags'])->get();
        return response()->json([
            "success" => true,
            "results" => $eventi
        ]);
    }

    public function show($id)
    {
        $event = \App\Models\Event::with(['user', 'tags'])->find($id);
        return response()->json([
            "success" => true,
            "results" => $event
        ]);
    }
}
