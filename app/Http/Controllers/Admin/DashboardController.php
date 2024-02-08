<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Tag;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $tags = Tag::all();
        return view('admin.dashboard', compact('events', 'tags'));
    }
}
