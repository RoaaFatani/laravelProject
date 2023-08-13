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
            )->paginate(10),
            'categories'=> Category::all()
        ]);
    }
    public function show(Post $post)
    {
        return view('post',[
            'post'=>$post
    ]);
    }
    public function create()
    {
        return view('posts.create');
    }
}

