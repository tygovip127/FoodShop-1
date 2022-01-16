<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    $request->validate([
      '_fullname' => ['required', 'string', 'max:255'],
      '_username' => ['required', 'string', 'max:255', 'unique:users,username'],
      '_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
      '_password' => ['required', 'string', 'min:8'],
      '_re-password' => ['required_with:password|same:password', 'string', 'min:8'],
      '_phone' => ['required', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
    ]);
    try {
      DB::beginTransaction();
      $user = User::create([
        'fullname' => $request->input('_fullname'),
        'username' => $request->input('_username'),
        'email' => $request->input('_email'),
        'phone' => $request->input('_phone'),
        'password' => Hash::make($request->input('_password')),
        'token' => Hash::make(Str::random(64)),
      ]);
      $user->roles()->sync('2');
      DB::commit();
      return redirect()->intended('/login-register')->with('reg_success', 'Register successfully!');;
    } catch (\Exception $exception) {
      DB::rollBack();
      return redirect()->intended('/login-register');
    }
  }
}
