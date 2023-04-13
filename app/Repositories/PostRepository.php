<?php

namespace App\Repositories;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function allPosts()
    {
        return Post::orderBy('id', 'desc')->get();
    }

    public function storePost($data)
    {
        return Post::create([
            'title'  => $data['title'],
            'image'    => $data['image'],
            'status'     => isset($data['status']) ? true : false,
            'description'   => $data['description'],
            'publication_date' => date('Y-m-d'),
        ]);
    }

    public function findPost($id)
    {
        return Post::find($id);
    }

    public function updatePost($data, $id)
    {
        $Post = Post::where('id', $id)->first();
        $Post->name = $data['name'];
        $Post->slug = $data['slug'];
        $Post->save();
    }

    public function destroyPost($id)
    {
        $Post = Post::find($id);
        $Post->delete();
    }
}
