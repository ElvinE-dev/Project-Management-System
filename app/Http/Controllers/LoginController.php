<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => "string|required",
            'password' => 'string|required',
        ]);


        if(Auth::attempt($credentials, $request->boolean('remember'))){
            $request->session()->regenerate();
            // dd('LOGIN SUCCESS');
            
            return redirect()->intended('/dashboard');
        }
        
        // dd('LOGIN SUCCESS');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    public function getData(){
        $user = Auth::user();
        return response()->json($user,201);
    }
}
