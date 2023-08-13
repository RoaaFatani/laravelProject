<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

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

    public function store()
    {
//        $path = request()->file('thumbnail')->store('thumbnail');
//
//        return "done" . $path;

        $attributes = request()->validate([
            'title'=> 'required',
            'thumbnail'=>'required|image',
            'slug'=> ['required',Rule::unique('posts','slug')],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);

        $attributes['user_id'] =auth()->id();
        $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnail');


            Post::create($attributes);

        return redirect('/');
    }

}

