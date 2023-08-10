<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class,'show']);

Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts',[
        'posts' => $category->posts
            ->load(['category','author']),
        'currentCategory' => $category,
        'categories'=> Category::all()
    ]);

})->name('category');

Route::get('authors/{author:username}', function (User $author) {

    return view('posts',[
        'posts' => $author->posts
            ->load(['category','author']),
        'categories'=> Category::all()
    ]);

});

Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');
Route::get('login',[SessionController::class, 'create'])->middleware('guest');
Route::post('login',[SessionController::class, 'craete'])->middleware('auth');
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');



