<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
     return view('register.create');
    }

    public function store()
    {
        var_dump(request()->all());
        //create the user
        $attributes = request()->validate([
            'name' =>'required|max:255',
            'username'=>'required|min:3|max:255|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|confirmed|max:255|min:7',

        ]);

//        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/');

    }
}
