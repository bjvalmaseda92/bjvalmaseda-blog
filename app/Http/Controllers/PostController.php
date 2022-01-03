<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create([
            "title" => $request->title,
            "body" => $request->body,
            "image" => $request->image,
            "slug" => Str::slug($request->title),
        ]);

        $tags = [];
        foreach ($request->tags as $tag) {
            $tags[] = Tag::firstOrCreate(["name" => $tag])->id;
        }

        $post->tags()->sync($tags);

        return redirect(route("post.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->file("image")) {
            $post->image = $request->image;
        }

        $post->update([
            "title" => $request->title,
            "body" => $request->body,
            "slug" => Str::slug($request->title),
        ]);

        $tags = [];
        foreach ($request->tags as $tag) {
            $tags[] = Tag::firstOrCreate(["name" => $tag])->id;
        }

        $post->tags()->sync($tags);
        return redirect(route("post.edit", $post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route("post.index"));
    }
}
