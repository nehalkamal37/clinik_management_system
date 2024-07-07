<?php

namespace App\Http\Controllers\Appointments;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\userAppointment;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class userAppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=userAppointment::all();
        $users=User::all();
        return view('admins.dashboard.appointments.patients.all',compact('data','users'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=userAppointment::all();
        $users=User::all();
        return view('admins.dashboard.appointments.patients.add',compact('data','users'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' =>  'required',
            'day' => 'required|date|after:now',
            'hour' => 'required|date_format:H:i',

        ]);
// dd($request);
    // إدخال البيانات في قاعدة البيانات
    userAppointment::create($request->all());
    return redirect()->route('userAppointment.index')->with('success', 'تم إنشاء المستخدم بنجاح');

    }


    public function edit(string $id)
    {
        $appointment=userAppointment::find($id);
        $users=User::all();
        return view('admins.dashboard.appointments.patients.edit',compact('appointment','users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'day' => [
                    'required',
                    'date',
                    'after:now',
                    Rule::unique('user_appointments')
                        ->where(function ($query) use ($request) {
                            return $query->where('hour', $request->hour);
                        })
                        ->ignore($id),
                ],
                'hour' => 'required|date_format:H:i',
            ]);
        
            // عرض كافة القيم المرسلة من النموذج
           //  dd($id);
        
            // تحديث البيانات في قاعدة البيانات
           $ua= userAppointment::find($id);
            $ua->user_id = $request->user_id;
            $ua->day = $request->day;
            $ua->hour = $request->hour;
            $updateSuccessful = $ua->update($request->all());
        
            if (!$updateSuccessful) {
                return back()->with('error', 'لم يتم تحديث الموعد');
            }
        
            return redirect()->route('userAppointment.index')->with('success', 'تم تحديث الموعد بنجاح');
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d=userAppointment::findOrFail($id);
        $d->delete($id);
        return redirect()->route('userAppointment.index')->with('success', 'تم حذف  بنجاح');
        
    }
}
