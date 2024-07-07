<?php

namespace App\Http\Controllers\Appointments;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\DoctorAppointment;
use App\Http\Controllers\Controller;

class docAppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=DoctorAppointment::all();
        $doctors=Doctor::all();
        return view('admins.dashboard.appointments.doctors.all',compact('data','doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=DoctorAppointment::all();
        $doctors=Doctor::all();
        return view('admins.dashboard.appointments.doctors.add',compact('data','doctors'));
    

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' =>  'required',
            'appointment_time' => 'required|date|after:now',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',

        ]);
// dd($request);
    // إدخال البيانات في قاعدة البيانات
    DoctorAppointment::create($request->all());
    return redirect()->route('doctorsAppointments.index')->with('success', 'تم إنشاء المستخدم بنجاح');

    
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $appointment=DoctorAppointment::find($id);
        $doctors=Doctor::all();
        return view('admins.dashboard.appointments.doctors.edit',compact('appointment','doctors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
       $request->validate([
            'doctor_id' =>  'required',
            'appointment_time' => 'required|date|after:now'.Rule::unique('DoctorAppointment')->ignore($id),
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',

        ]);
        $doctorApp=DoctorAppointment::find($id);
        $doctorApp->update([
            'id'=>$id,
            'doctor_id' => $request->doctor_id,
            'appointment_time' => $request->appointment_time,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
    return redirect()->route('doctorsAppointments.index')->with('success', 'تم تعديل الموعد  بنجاح');

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d=DoctorAppointment::findOrFail($id);
        $d->delete($id);
        return redirect()->route('doctorsAppointments.index')->with('success', 'تم حذف الطبيب بنجاح');
        
    
    }
}
