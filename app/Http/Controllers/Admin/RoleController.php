<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // public function __construct( )
    // {
    //     $this->middleware('permission:view_role|add_role', ['only' => ['index','store']]);
    //     $this->middleware('permission:add_role', ['only' => ['create','store']]);
    //     $this->middleware('permission:edit_role', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete_role', ['only' => ['destroy']]);        
    // }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.roles.index', compact('roles'));
    }
 
    public function create()
    {
        $permissions = Permission::where('guard_name', 'employee')->get()->groupBy('parent');
        return view('admin.roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
        ]);

        DB::transaction(function () use($request) {
            $role = Role::create(['name' => $request->input('name'), 'guard_name' => 'employee']);
            $role->syncPermissions($request->input('permission'));
        });
        
        return redirect()->route('adm.roles.index');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::where('guard_name', 'employee')->get()->groupBy('parent');
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('admin.roles.edit',compact('role','permissions','rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),  [
                'name' => 'required',
                'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');

        DB::transaction(function () use($role, $request) {
            $role->save();
            $role->syncPermissions($request->input('permission'));
        });

        return redirect()->route('adm.roles.index');
    }

    public function destroy($id)
    {
        DB::transaction(function () use($id) {
            Role::destroy($id);
        });
        return redirect()->route('adm.roles.index');
    }
}
