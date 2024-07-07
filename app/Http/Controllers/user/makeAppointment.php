<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Models\userAppointment;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class makeAppointment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=userAppointment::where('user_id',Auth::user()->id)->get();
      foreach($user as $u){
       if($u->id == null){
        return view('users.dashboard.appointment.all');

       }

      }
        return view('users.dashboard.appointment.all',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $email=$request->input('email');
     //  dd(Auth::user()->id);
        if($email == Auth::user()->email){
        $request->validate([
           
            'day' => 'required|date|after:now',
            'hour' => 'required|date_format:H:i',

        ]);
       
    userAppointment::create([        
'user_id'=>Auth::user()->id,
'day'=>$request->day,
'hour'=>$request->hour
    ]);
    return redirect()->route('user.front')->with('success', 'تم إنشاء المستخدم بنجاح');
    }else{
        return redirect()->route('user-register');

    }
        }

  
    public function edit(string $id)
    {
        $appointment=userAppointment::find($id);
       // $users=User::all();
        return view('users.dashboard.appointment.edit',compact('appointment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
           // 'user_id' => 'required|exists:users,id',
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
        // تحديث البيانات في قاعدة البيانات
       $ua= userAppointment::find($id);
        $ua->user_id = Auth::user()->id;
        $ua->day = $request->day;
        $ua->hour = $request->hour;
        $updateSuccessful = $ua->update($request->all());
    
        if (!$updateSuccessful) {
            return back()->with('error', 'لم يتم تحديث الموعد');
        }
    
        return redirect()->route('appointment.index')->with('success', 'تم تحديث الموعد بنجاح');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
