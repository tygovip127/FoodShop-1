<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// use 
class UserController extends Controller
{
  public function update(Request $request, $id)
  {
    $request->validate([
      'fullname' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'phone' => ['required', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
    ]);

    $user =User::find($id);
    $user->update($request->all());
    return $user;
    // try {
    // } catch (\Exception $e) {

    // }
  }
}
