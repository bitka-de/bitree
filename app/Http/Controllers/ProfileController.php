<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'user_image' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:8',
            'current_password' => 'required_with:password',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            if (!\Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Das aktuelle Passwort ist falsch.'])->withInput();
            }
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('user_image')) {
            $path = $request->file('user_image')->store('profile_images', 'public');
            $user->user_image = 'storage/' . $path;
        }

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profil erfolgreich aktualisiert!');
    }
}
