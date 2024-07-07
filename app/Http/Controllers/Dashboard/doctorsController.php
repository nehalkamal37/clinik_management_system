<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class doctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors=Doctor::all();
        return view('admins.dashboard.doctors.all',compact('doctors'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.dashboard.doctors.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'small_desc' => 'required|string|max:1255',
            'doc_image'=>'sometimes|image|mimes:jpeg,jpg,bmp,png,svg|max:2048',
            'gender' => 'in:male,female',
            'email' => 'required|email|unique:doctors|max:333',
            'password' => 'required|min:7|max:33',
            'phone' => 'required|max:18',
            'doc_department' => 'required|string|max:1255',

        ]);
    
    // استخراج البيانات بدون صورة المستخدم
    $requested_data = $request->except('doc_image');
   // dd($requested_data);
    // التحقق من وجود صورة ورفعها
    if ($request->hasFile('doc_image')) {
        $image = $request->file('doc_image');
        $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/doctors'), $img_name);
        
        $requested_data['doc_image'] = $img_name;
    
}
    // تشفير كلمة المرور قبل الإدخال
    $requested_data['password'] = bcrypt($requested_data['password']);

    // إدخال البيانات في قاعدة البيانات
    Doctor::create($requested_data);
    return redirect()->route('doctors.index')->with('success', 'تم إنشاء المستخدم بنجاح');

    }

 
    public function edit(string $id)
    {
        
        $doctor=Doctor::find($id);
        return view('admins.dashboard.doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'small_desc' => 'required|string|max:1255',
            'doc_image'=>'sometimes|image|mimes:jpeg,jpg,bmp,png,svg|max:2048',
            'gender' => 'in:male,female',
            'email' => 'required|email|max:333',
            'password' => 'required|min:7|max:33',
            'phone' => 'required|max:18',
            'doc_department' => 'required|string|max:1255',

        ]);
    
    // استخراج البيانات بدون صورة المستخدم
    $requested_data = $request->except('doc_image');
   // dd($requested_data);
    // التحقق من وجود صورة ورفعها
    if ($request->hasFile('doc_image')) {
        $image = $request->file('doc_image');
        $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/doctors'), $img_name);
        
        $requested_data['doc_image'] = $img_name;
    
   /* try {
        $path = $image->storeAs('', $img_name, 'img_uploads');
        $requested_data['doc_image'] = $path;
    } catch (\Exception $e) {
        return 'noooooo';
    }*/
}
    // تشفير كلمة المرور قبل الإدخال
    $requested_data['password'] = bcrypt($requested_data['password']);
//dd($requested_data);
    // إدخال البيانات في قاعدة البيانات
    $doctor->update($requested_data);
    return redirect()->route('doctors.index')->with('success', 'تم تعديل المستخدم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor=Doctor::findOrFail($id);
        $doctor->delete($id);
        return redirect()->route('doctors.index')->with('success', 'تم حذف الطبيب بنجاح');
        
    }
}
