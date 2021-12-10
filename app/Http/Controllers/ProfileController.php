<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $id = Auth::user()->id;
        $address = AddressController::getUserAddress($id);
        return view('profile', ['provinces' => $provinces, 'address' => $address]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})\b/'],
          ]);

          $user = User::find(Auth::user()->id);
          $user->update($request->all());
          return redirect()->intended('/profile')->with('user_success', 'Change user information successfully!');
    }
}
