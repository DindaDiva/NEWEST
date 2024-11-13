<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SesiController extends Controller
{
    // get
    function index() {
        return view('auth.login');
    }

    // Post
    function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('admin-home');
            } elseif ($user->role === 'cust') {
                return view('cust.home');
            }
        } else {
            return redirect('/')->withErrors('Username atau password salah')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('home')->with('success', 'You have been logged out.');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Log the user in automatically after registration
        auth()->login($user);

        return redirect()->route('home'); // or wherever you want to redirect after registration
    }
}
