<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registo(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $emailExist = User::where('email', $request->get('email'))->count()>0;

        if($emailExist){
           return redirect()->back()->withErrors(['mensagem' => 'Utilziador já registado']);
        }

        $validated['password'] = bcrypt($validated['password']);
        $user = new User($validated);
        $user->save();
        return redirect('/');

    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('projects.index');
        }
        return view('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('home');
    }
}
