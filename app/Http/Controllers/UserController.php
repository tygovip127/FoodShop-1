<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users-managerment', ['users'=> $users]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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
          return redirect()->intended('/account')->with('user_success', 'Change user information successfully!');
    }

    public function destroy($id)
    {
        //
    }
}
