<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Employee;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $employees = Employee::with('roles')->get(); 
        return view('website.chats.index', compact('employees'));
    }

    public function home()
    {
        //بتجيب الرسائل اللي قاد ببعتها الأدمن
        $data = Chat::where('user_id', auth()->user()->id)->where('sender', 'employee')->where('user_read', '!==', 1)->get();
        foreach($data as $chat_id){
            $chat_id->update(['user_read' => 1]);
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        Chat::create([
            'user_id' => auth()->user()->id,
            'employee_id' => $request->employee_id,
            'message' => $request->message, 
            'sender'  => 'user', 
            'user_read'  => 1, 
        ]);
        return response()->json(true, 200);
    }

    public function show($id)
    {
        $data['chats'] = Chat::where('user_id', auth()->user()->id)->where('employee_id', $id)->get();
        $data['employee'] = Employee::find($id); 
        return view('website.chats.show', $data);
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
        //
    }
}
