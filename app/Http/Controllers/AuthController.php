<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

        public function register(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        
            // Buat user baru dengan role default "user"
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'role' => 'cust', // Role default
            ]);
        
            // Redirect atau login otomatis
            return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
        }
}
