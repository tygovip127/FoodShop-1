<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Models\Permission;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

    use DeleteModelTrait;

    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions_parent = Permission::where('parent_id', 0)->get();
        return view('admin.permissions-management', compact('permissions_parent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        try {
            DB::beginTransaction();
            $permission = Permission::create([
                'name' => $request->module_parent,
                'display_name' => $request->module_parent,
                'parent_id' => 0
            ]);

            foreach($request->module_children as $module_children)
            {
                Permission::create([
                    'name' => $module_children . ' ' . $request->module_parent,
                    'display_name' => $module_children . ' ' . $request->module_parent,
                    'parent_id' => $permission->id,
                    'key_code' => $module_children . '_' . $request->module_parent
                ]);
            }
            DB::commit();
            return redirect()->route('admin.permissions.index')->with('permission_success', 'Create permission success');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.permissions.index')->with('permission_fail', 'Create permission error.' . ' --- Line : ' . $exception->getLine());
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //error: doesn't show success deleted alert after deleted permission
        $permission_parent = Permission::find($id);
        try {
            DB::beginTransaction();
            foreach($permission_parent->permissionsChildren as $permission_child)
            {
                Permission::find($permission_child->id)->delete();
            }
            $this->deleteModelTrait($this->permission, $id);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
