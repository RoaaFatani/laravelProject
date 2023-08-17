<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.profile.index', [

        ]);
    }
    public function posts()
    {
        return view('user.profile.posts');
    }
    public function comments()
    {
        return view('user.profile.comments');
    }
}
