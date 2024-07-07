<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\userRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=userRecord::all();
        return view('admins.dashboard.records.all',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view('admins.dashboard.records.add',compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request);
    $request->validate([
      "user_id" => "required",
      "registration_date" => "required|date",
      "medical_condition" => "required|string|max:1222",
      "medical_history" => "required|string|max:1222",
      "mediciens"=>' required|string|max:1222'
        ]);

        userRecord::create($request->all());
        return redirect()->route('userRecord.index')->with('success', 'تم إنشاء المستخدم بنجاح');
    
    }

    public function edit(string $id)
    {
        $user=userRecord::find($id);
        $users=User::all();

        return view('admins.dashboard.records.edit',compact('user','users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "user_id" => "required",
            "registration_date" => "required|date",
            "medical_condition" => "required|string|max:1222",
            "medical_history" => "required|string|max:1222",
            "mediciens"=>' required|string|max:1222'
              ]);
      $userRecord=userRecord::find($id);
      ///dd($userRecord->id );

              $userRecord->update([
                'id'=>$userRecord->id,
                'medical_condition'=> $request->medical_condition , 
                'registration_date'=> $request->registration_date,
                 'mediciens'=> $request->mediciens,
                'medical_history'=>$request->medical_history
            ]);
              return redirect()->route('userRecord.index')->with('success', 'تم التعديل  بنجاح');
          
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d=userRecord::findOrFail($id);
        $d->delete($id);
        return redirect()->route('userRecord.index')->with('success', 'تم الحذف  بنجاح');

    }
}
