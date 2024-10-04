<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        return new TagResource($tag, 201);
    }

    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return new TagResource($tag, 200);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully'], 204);
    }
}
