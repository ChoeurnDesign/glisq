<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return Inertia::render('User/Profile', [
            'user' => $request->user()->only('name','email'),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255'],
            'password' => ['nullable','confirmed','min:8'],
        ]);

        $user = $request->user();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        return back()->with('success','Profile updated.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required']
        ]);
        $user = $request->user();
        if (!Hash::check($request->input('password'), $user->password)) {
            return back()->withErrors(['password' => 'Password is incorrect.']);
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success','Account deleted.');
    }
}