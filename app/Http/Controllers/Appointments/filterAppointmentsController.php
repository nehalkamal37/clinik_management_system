<?php

namespace App\Http\Controllers\Appointments;

use App\Models\User;
use App\Models\Doctor;
use App\Models\userRecord;
use Illuminate\Http\Request;
use App\Models\userAppointment;
use App\Models\DoctorAppointment;
use App\Http\Controllers\Controller;

class filterAppointmentsController extends Controller
{

    public function index(Request $request)
    {
        // استقبال قيمة doctor_id من طلب GET
        $doctorId = $request->input('doctor_id');
        // التحقق إذا كان هناك قيمة محددة
        if ($doctorId) {
            // الحصول على الأدوية الخاصة بالطبيب المختار
            $data = DoctorAppointment::where('doctor_id', $doctorId)->get();
        } else {
            // إذا لم يكن هناك طبيب محدد، إظهار جميع الأدوية
            $data = DoctorAppointment::all();
        }

        // عرض النتيجة (يمكنك تعديل هذا الجزء ليعرض النتائج في عرض معين)
        $doctors=Doctor::all();
        return view('admins.dashboard.appointments.doctors.all',compact('data','doctors'));
        }

        public function userApp(Request $request)
        {
            $userId = $request->input('user_id');
            if ($userId) {
                $data = userAppointment::where('user_id', $userId)->get();
            } else {
                $data = userAppointment::all();
            }
                        $users=User::all();
            return view('admins.dashboard.appointments.patients.all',compact('data','users'));
            }

            public function userRecord(Request $request)
            {
                $userId = $request->input('user_id');
                if ($userId) {
                    $data = userRecord::where('user_id', $userId)->get();
                } else {
                    $data = userRecord::all();
                }
                            $users=User::all();
                return view('admins.dashboard.records.all',compact('data','users'));
                }
}
        
    

