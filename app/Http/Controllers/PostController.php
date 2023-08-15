<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
//        return view('posts',[
//            'posts' => Post::latest()->filter(
//                request(['search'])
//            )->paginate(9),
//            'categories'=> Category::all()
//        ]);
        return view('posts', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(18)->withQueryString(),
            'categories'=> Category::all()
        ]);
    }
    public function show(Post $post)
    {
        return view('post',[
            'post'=>$post
    ]);
    }

}

