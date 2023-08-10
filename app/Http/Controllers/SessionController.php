<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    public function store(){
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (auth()->attempt($attributes)){
            return redirect('/')->with('success','Welcome Back!');
        }

        return back()
            ->withInput()
            ->withErrors(['email'=>'Your provided credentials could not be verified']);
    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');

    }

}
