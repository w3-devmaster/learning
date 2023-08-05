<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json(PostResource::collection($posts));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'img.*' => 'required|image|mimes:png,jpg,webp|max:1024',
        ]);

        $user = User::find($request->user()->id);

        $post = $user->posts()->create($request->all());

        $post->saveFromRequest('posts',$request->img);

        return response()->json(new PostResource($post));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json(new PostResource($post));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'sometimes|nullable|string',
            'content' => 'sometimes|nullable|string',
        ]);

        $post->update($request->all());

        return response()->json(['message' => 'update success','post' => new PostResource($post)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(['message' => 'succesful deleted post','post' => new PostResource($post)]);
    }
}
