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
  // public function __construct()
  // {
  //   $this->middleware('guest');
  // }

  protected function create(Request $request)
  {
    $valid=$request->validate([
      'fullname' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
      're-password' => ['required_with:password|same:password', 'string', 'min:8'],
      'phone' => ['required','regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
    ]);

    $user= User::create([
      'fullname' => $request->input('fullname'),
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'phone' => $request->input('phone'),
      'password' => Hash::make($request->input('password')),
      'token' => Hash::make(Str::random(64)),
    ]);
    if($valid){
      return view('login-register');
    }
  }
}
