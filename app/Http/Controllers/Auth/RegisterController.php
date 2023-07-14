<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }

    public  function store(Request $request)
    {
        $request->request->add([
            'username' => Str::slug($request->username),
        ]);

        // validation
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|confirmed|min:6',
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // auth
        auth()->attempt($request->only('email', 'password'));

        //redirect user
        return redirect()->route('post.index', auth()->user()->username);
    }
}
