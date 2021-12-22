<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function changePassword(Request $request)
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

        //User login with google account and don't set the password 
        if ($user->google_id && $user->password == null &&$new_pwd===$confirm_pwd) {
            $_user = User::find($user->id);
            $_user->password = Hash::make($new_pwd);
            $_user->save();
            return redirect()->indented('/profile')->with('pwd_success', 'Change password successfully!');
        }

        if (Hash::check($current_pwd, $user->password) && $new_pwd===$confirm_pwd) {
            $_user = User::find($user->id);
            $_user->password = Hash::make($new_pwd);
            $_user->save();
            return redirect()->intended('/profile')->with('pwd_success', 'Change password successfully!');
        }
        return redirect()->intended('/profile')->with('pwd_fail', 'The password is incorrect. Please check again!');
    }


    public function sentEmailLink(Request $request){
        $request->validate(["email"=> 'required|email']);

        // sent reset link to user's email address
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request, $token){
        $email = $request->get('email');
        return view('user.reset-password', ['token' => $token, 'email' => $email]);
    }


    public function updatePassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login-register')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }


    // public static function randomCode($length){
    //     $keys = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
    //     $code = "";
    //     for($i=0; $i < $length; $i++) {
    //         $code .= $keys[mt_rand(0, count($keys) - 1)];
    //     }
    //     return $code;
    // }

}
