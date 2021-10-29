<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function reset(Request $request)
    {
        $valid = $request->validate([
            'current_pwd' => ['string', 'min:8'],
            'new-pwd' => ['required', 'string', 'min:8'],
            'confirm-pwd' => ['required_with:new-pwd|same:new-pwd', 'string', 'min:8'],
        ]);
        $user = Auth::user();
        $current_pwd = $request->input('current-pwd');
        $new_pwd = $request->input('new-pwd');
        $confirm_pwd = $request->input('confirm-pwd');

        //User login with google before 
        if ($user->google_id && $user->password == null &&$new_pwd===$confirm_pwd) {
            $_user = User::find($user->id);
            $_user->password = Hash::make($new_pwd);
            $_user->save();
            return redirect()->indented('/account')->with('pwd_success', 'Change password successfully!');
        }

        if (Hash::check($current_pwd, $user->password) && $new_pwd===$confirm_pwd) {
            $_user = User::find($user->id);
            $_user->password = Hash::make($new_pwd);
            $_user->save();
            return redirect()->intended('/account')->with('pwd_success', 'Change password successfully!');
        }
        return redirect()->intended('/account')->with('pwd_fail', 'The password is incorrect. Please check again!');
    }
}
