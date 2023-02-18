<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    // public function __construct( )
    // {
    //     $this->middleware('permission:view_employee|add_employee', ['only' => ['index','store']]);
    //     $this->middleware('permission:add_employee', ['only' => ['create','store']]);
    //     $this->middleware('permission:edit_employee', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete_employee', ['only' => ['destroy']]);        
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.employees.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|digits:10|numeric|Starts_with:05',
            'email' => 'required|email:rfc,dns|unique:employees,email',
            'password' => 'required',
            'roles' => 'required|numeric|exists:roles,id'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        DB::transaction(function () use($request,$data) {
            $user = Employee::create($data);
            $user->assignRole($request->input('roles'));
        });
        return redirect()->route('adm.employees.index');
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
        $employee = Employee::find($id);
        $roles = Role::get();
        $employeeRole = $employee->roles->first();
        return view('admin.employees.edit', compact('employee', 'roles', 'employeeRole'));
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
        $data = $request->except('_token');
        $validator = Validator::make($request->all(),  [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|digits:10|numeric|Starts_with:05',
            'email' => 'required|email:rfc,dns|unique:employees,email,' . $id,
            'roles' => 'required|numeric|exists:roles,id'
        ]);

        $employee = Employee::find($id);
        $employee->update($data);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $employee->assignRole($request->input('roles'));
        return redirect()->route('adm.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json('success');
    }
}
