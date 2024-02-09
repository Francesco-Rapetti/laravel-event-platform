<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function validation(Request $request)
    {
        $request->validate([
            "name" => "required",
            "color" => "required",
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view("admin.tags.index", compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Tag::all()->pluck("color")->toArray();
        return view("admin.tags.create", compact("colors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        $tag = new Tag();
        $tag->fill($request->all());
        $tag->save();
        return redirect()->route("admin.tags.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view("admin.tags.show", compact("tag"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = Tag::all()->pluck("color")->toArray();
        return view("admin.tags.edit", compact("tag", "colors"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validation($request);
        $tag->fill($request->all());
        $tag->save();
        return redirect()->route("admin.tags.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route("admin.tags.index");
    }
}
