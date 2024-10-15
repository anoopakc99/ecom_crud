<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login page
    public function login()
    {
        return view('Admin.login');
    }
    

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    //dashboard
    public function dashboard()
    {
        $products = Product::all();
        return view('Admin.dashboard',compact('products'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('message', 'Successfully logged out.');
    }

}
