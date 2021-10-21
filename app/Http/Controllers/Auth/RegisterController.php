<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
  //
  public function __construct()
  {
    $this->middleware('guest');
  }

  protected function create(Request $request)
  {
    // $request->validate([
    //   'fullname' => ['required', 'string', 'max:255'],
    //   'username' => ['required', 'string', 'max:255'],
    //   'email' => ['required', 'string', 'email', 'max:255', 'unique'],
    //   'password' => ['required', 'string', 'min:8', 'confirmed'],
    //   'phone' => ['required', 'string', 'max:10'],
    // ]);

    $user= User::create([
      'fullname' => $request->input('fullname'),
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'phone' => $request->input('phone'),
      'password' => Hash::make($request->input('password')),
      'token' => Hash::make(Str::random(64)),
    ]);
    return view('login-register');
  }
}
