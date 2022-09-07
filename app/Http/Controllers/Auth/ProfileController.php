<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message', 'Mot de passe modifie avec succès!');
    }
}
