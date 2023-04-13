<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postRepository->allPosts();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $attributes = $request->only(['title', 'description','status']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'IMG_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/posts'), $filename);
            $attributes['image'] = $filename;
        }

        $this->postRepository->storePost($attributes);

        return redirect()->route('posts.index')->with('message', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = $this->postRepository->findPost($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $this->postRepository->updatePost($request->all(), $id);

        return redirect()->route('posts.index')->with('message', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postRepository->destroyPost($id);

        return redirect()->route('posts.index')->with('status', 'Post Delete Successfully');
    }
}
