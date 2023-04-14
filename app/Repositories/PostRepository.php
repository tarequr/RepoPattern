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
        $post = Post::findOrFail($id);

        if (isset($data['image'])) {
            @unlink(public_path('upload/posts/' . $post->image));
        }
        return  $post->update([
            'title'  => $data['title'],
            'image'    => $data['image'] ?? $post->image,
            'status'     => isset($data['status']) ? true : false,
            'description'   => $data['description'],
        ]);
    }

    public function destroyPost($id)
    {
        $Post = Post::find($id);
        $Post->delete();
    }
}
