<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function login(Request $request)
    {
        $request->validate([
            "username-email" => "required",
            "password" => "required",
        ]);
        $username_email = $request->input('username-email');
        $password = $request->input('password');
        $user = User::where(['username' => $username_email])
            ->orwhere(['email' => $username_email])->first();
        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put('user', $user);
            return view('index', [
                'user' => $user
            ]);
        } else {
            return view('/login-register');
        };
    }
}
