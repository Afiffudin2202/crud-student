<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('authenticate.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns|',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated )) {
            
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('error', 'gagal Login');
    }


    public function logout( Request $request , User $user)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard');
    }
}
