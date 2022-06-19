<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }

    public function authentication(Request $request)
    {
        $remember_me = $request->remember ? true : false;

        $user = $request->validate([
            'email' => 'required', 'email', 'exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($user, $remember_me)) {
            return redirect('/');
        };

        return back()->with('auth-failed', 'These credentials do not match our records.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
