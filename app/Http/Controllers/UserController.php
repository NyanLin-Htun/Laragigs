<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }
    public function store(Request $request)                         
    {
        $registerdata = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //Hash Password
        // $registerdata['password'] = bcrypt($registerdata['password']);

        //Create User
        $user = User::create($registerdata);

        //login
        auth()->login($user);

        return redirect('/')->with('message','Create User Successfully');
    }
    public function logout(Request $request)
    {

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out, Successfully.');
    }
    public function login()
    {
        return view('users.login');
    }
    public function authenticate(Request $request)
    {
        $logindata = $request-> validate([
            'email' => ['required','email'],
            'password'=> 'required'
        ]);
        if(auth()->attempt($logindata)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in!');
        }
        return back()->withErrors(['email' => 'Invalid Credential'])->onlyInput('email');
    }
}
