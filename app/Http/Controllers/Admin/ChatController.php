<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // public function __construct( )
    // {
    //     $this->middleware('permission:view_chat|add_chat', ['only' => ['index','store']]);
    //     $this->middleware('permission:add_chat', ['only' => ['create','store']]);
    //     $this->middleware('permission:edit_chat', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete_chat', ['only' => ['destroy']]);        
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_id = Chat::where( 'employee_id', auth()->guard('employee')->user()->id)->pluck('user_id');
        $users = User::whereIn('id', $users_id)->get();
        $employee = Employee::find( auth()->guard('employee')->user()->id);
        return view('admin.chat.index', compact('users', 'employee'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users_id = Chat::where('employee_id', auth()->guard('employee')->user()->id)->pluck('user_id');
        $users = User::whereIn('id', $users_id)->get();
        $employee = Employee::find( auth()->guard('employee')->user()->id);

        $user_chat = Chat::where('employee_id', auth()->guard('employee')->user()->id)->where('user_id', $id)->with('user')->get();
        // foreach($user_chat as $chat_id){
        //     $chat_id->update(['read' => 1]);
        // }

        return view('admin.chat.index', compact('users', 'user_chat', 'employee'));
    }

    public function addNew(Request $request)
    {
        Chat::create([
            'user_id' => $request->userid,
            'message' => $request->message, 
            'sender'  => 'employee', 
            'employee_read'  => 1, 
            'employee_id'  => auth()->guard('employee')->user()->id, 
        ]);
        return response()->json(true, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Chat::where('user_id', $request->userid)->where('employee_read', '!==', 1)->get();
        foreach($data as $chat_id){
            $chat_id->update(['employee_read' => 1]);
        }
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $employee = Employee::find($request->userid);
        if($employee->connection_status == 0){
            $employee->update([
                'connection_status' => 1
            ]);
        }else{
            $employee->update([
                'connection_status' => 0
            ]);
        }

        return response()->json('success');
    }
}
