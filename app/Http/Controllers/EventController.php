<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Tag;

class EventController extends Controller
{
    public function validation(Request $request)
    {
        $request->validate([
            "name" => "required",
            // "description" => "required",
            "date" => "required|date",
            // "tags" => "required",
            "available_tickets" => "required|integer",
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view("admin.events.index", compact("events"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view("admin.events.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $event = new Event();
        $event->fill($request->all());
        $event->save();
        $event->tags()->attach($request->tags);
        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view("admin.events.show", compact("event"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $tags = Tag::all();
        return view("admin.events.edit", compact("tags", "event"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $this->validation($request);
        $event->fill($request->all());
        $event->save();
        $event->tags()->sync($request->tags);
        return redirect()->route("admin.events.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route("admin.events.index");
    }
}
