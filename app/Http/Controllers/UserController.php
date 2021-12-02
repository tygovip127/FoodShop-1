<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use DeleteModelTrait;

    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $this->authorize('list_user');
        $users = User::paginate(10);
        return view('admin.users-managerment', ['users' => $users]);
    }

    public function create()
    {
        $this->authorize('create_user');
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(RegisterUserRequest $request)
    {
        $this->authorize('create_user');
        try {
            DB::beginTransaction();

            $user = User::create([
                'fullname' => $request->input('fullname'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'token' => Hash::make(Str::random(64)),
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('admin.users.create');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->authorize('edit_user');
        $user = User::find($id);
        $roles = Role::all();
        $roles_selected = $user->roles;
        return view('users.edit', compact('user', 'roles', 'roles_selected'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->authorize('edit_user');
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('admin.users.edit', array($id))->with('user_success', 'Change user role successfully!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete_user');
        return $this->deleteModelTrait($this->user, $id);
    }
}
