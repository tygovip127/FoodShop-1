<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Sessions;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class LoginController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    protected function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

        // $username_email = $request->input('username-email');
        // $password = $request->input('password');
        // $user = User::where(['username' => $username_email])
        //     ->orwhere(['email' => $username_email])->first();
        // if ($user && Hash::check($password, $user->password)) {
        //     $request->session()->put('user', $user);
        //     return view('index', [
        //         'user' => $user
        //     ]);
        // } else {
        //     return view('/login-register');
        // };
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userData = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $userData->email)->first();

        if ($user) {
            if (!($user->google_id)) {
                $user->update([
                    'google_id' => $userData->id,
                    'avatar' => $userData->avatar_original
                ]);
            }
        } else {
            User::create([
                'fullname' => $userData->name,
                'email' => $userData->email,
                'google_id' => $userData->id,
                'avatar' => $userData->avatar_original,
                'token' => Hash::make(Str::random(64)),
            ]);
        }
        Auth::login($user);
        return redirect('/');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $userData = Socialite::driver('facebook')->stateless()->user();
        $user = User::where('email', $userData->email)->first();

        if ($user) {
            if (!($user->facebook_id)) {
                $user->update([
                    'facebook_id' => $userData->id,
                    'avatar' => $userData->avatar_original
                ]);
            }
        } else {
            User::create([
                'fullname' => $userData->name,
                'email' => $userData->email,
                'facebook_id' => $userData->id,
                'avatar' => $userData->avatar_original,
                'token' => Hash::make(Str::random(64)),
            ]);
        }
        Auth::login($user);
        return redirect('/');
    }
}
