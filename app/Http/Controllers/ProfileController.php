<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $path = $file->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
} 