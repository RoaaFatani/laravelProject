<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
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

Route::get('ping',function(){
 $mailchimp = new \MailchimpMarketing\ApiClient();

 $mailchimp->setConfig([
     'apikey' => 'services.mailchimp.key',
     'server' => 'us13'
 ]);

 $response = $mailchimp->ping->get();
 ddd($response);
});

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
Route::post('login',[SessionController::class, 'store'])->middleware('guest');
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');

//comment
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//admin route
Route::post('admin/posts',[AdminController::class, 'store'])->middleware('admin');
Route::get('admin/posts',[AdminController::class, 'index'])->middleware('admin');
Route::get('admin/posts/create',[AdminController::class, 'create'])->middleware('admin');
Route::get('admin/posts/{post}/edit',[AdminController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}',[AdminController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}',[AdminController::class, 'destroy'])->middleware('admin');




