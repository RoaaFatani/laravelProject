<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('posts',[
            'posts' => Post::latest()->filter(
                request(['search'])
            )->get(),
            'category'=> Category::all()
        ]);
    }
    public function show(Post $post)
    {
        return view('post',[
            'post'=>$post
    ]);
    }
//
//    protected function getPost()
//    {
//        return Post::latest()->filter()->get();
////        $posts = Post::latest();
////
////        if(request('search'))
////        {
////            $posts
////                ->where('title', 'like', '%' . request('search') . '%')
////                ->orwhere('body', 'like', '%' . request('search') . '%');
////        }
////        return $posts->get();
//
//    }

}