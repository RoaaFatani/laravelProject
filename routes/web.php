<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//mail
Route::get('/',[PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class,'show']);
Route::get('authors/{author:username}', function (User $author) {
    return view('posts',[
        'posts' => $author->posts
    ]);
});
Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');
Route::get('login',[SessionController::class, 'create'])->middleware('guest');
Route::post('login',[SessionController::class, 'store'])->middleware('guest');
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');
//comment
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
//subscribe

Route::post('newsletter', NewsletterController::class);
//Route::get('ping',function (){
//    $mailchimp = new \MailchimpMarketing\ApiClient();
//
//    $mailchimp->setConfig([
//        'apiKey' => config('services.mailchimp.key'),
//        'server' => 'us13'
//    ]);
//
//    $response = $mailchimp->lists->addListMember('2cebef9ea0',[
//        'email_address' => 'roaafatani@outlook.com',
//        'status' => 'subscribed'
//    ]);
//    dd($response);
//});
//admin route
Route::post('admin/posts',[AdminController::class, 'store'])->middleware('admin');
Route::get('admin/posts',[AdminController::class, 'index'])->middleware('admin');
Route::get('admin/posts/create',[AdminController::class, 'create'])->middleware('admin');
Route::get('admin/posts/{post}/edit',[AdminController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{post}',[AdminController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}',[AdminController::class, 'destroy'])->middleware('admin');
// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminController::class)->except('show');
});
// User Section
Route::get('user/profile/index',[UserController::class,'index']);
Route::get('user/profile/posts',[UserController::class,'posts']);
Route::get('user/profile/comments',[UserController::class,'comments']);


