<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
   
    public function index()
    {
        return view('authenticate.register');
    }
  
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required'
        ];

        $validated = $request->validate($rules);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return redirect('login')->with('login', 'Register success');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
