<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function index()
    {
        $passwords = Auth::user()->passwords;
        return view('dashboard', compact('passwords'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        Auth::user()->passwords()->create([
            'title' => $request->title,
            'username' => $request->username,
            'url' => $request->url,
            'password' => $request->password,
        ]);

        return redirect()->route('dashboard');
    }
}
