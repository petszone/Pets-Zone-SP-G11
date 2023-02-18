<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // public function __construct( )
    // {
    //     $this->middleware('permission:view_appointment|add_appointment', ['only' => ['index','store']]);
    //     $this->middleware('permission:add_appointment', ['only' => ['create','store']]);
    //     $this->middleware('permission:edit_appointment', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete_appointment', ['only' => ['destroy']]);        
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::orderBy('id', 'DESC')->get();
        return view('admin.appointment.index', compact('appointments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);
        return view('admin.appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        return view('admin.appointment.edit', compact('appointment'));
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
        $appointment = Appointment::find($id);
        $appointment->update($data);
        return redirect()->route('appointments.index');
    }

    public function destroy($id)
    {
        Appointment::destroy($id);
        return response()->json('success');
    }

    public function changeStatus(Request $request, $id)
    {
        $app = Appointment::find($id);
        $app->update([
            'status' => $request->status
        ]);
        return redirect()->route('appointments.index');
    }
}
