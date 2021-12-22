<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{

    use DeleteModelTrait;

    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list_role');
        $roles = Role::paginate(10);
        return view('admin.roles-management', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create_role');
        $permissions_parent = Permission::where('parent_id', '0')->get();
        return view('roles.create', compact('permissions_parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize('create_role');
        try {
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->input('name'),
                'display_name' => $request->input('display_name')
            ]);

            $role->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('admin.roles.create')->with('role_success', 'Create role successfully!');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return redirect()->route('admin.roles.create')->with('role_fail', 'Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit_role');
        $role = Role::find($id);
        $permissions_parent = Permission::where('parent_id', '0')->get();
        $permissions_checked = $role->permissions;
        return view('roles.edit', compact('role', 'permissions_parent', 'permissions_checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, $id)
    {
        $this->authorize('edit_role');
        try {
            DB::beginTransaction();
            Role::find($id)->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
            $role = Role::find($id);
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('admin.roles.edit', array($id))->with('update_success', 'Update role successfully!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.roles.edit', array($id))->with('update_fail', 'Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete_role');
        return $this->deleteModelTrait($this->role, $id);
    }
}
