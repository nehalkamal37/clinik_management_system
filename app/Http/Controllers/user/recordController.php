<?php

namespace App\Http\Controllers\user;

use App\Models\userRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class recordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data=userRecord::where('user_id',Auth::user()->id)->get();
     
        return view('users.dashboard.record.all',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $user=userRecord::find($id);
     // dd($user);
        return view('users.dashboard.record.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            "registration_date" => "required|date",
            "medical_condition" => "required|string|max:1222",
            "medical_history" => "required|string|max:1222",
            "mediciens"=>' required|string|max:1222'
              ]);
      $userRecord=userRecord::find($id);
      ///dd($userRecord->id );

              $userRecord->update([
                'id'=>$id,
                'user_id'=>Auth::user()->id,
                'medical_condition'=> $request->medical_condition , 
                'registration_date'=> $request->registration_date,
                 'mediciens'=> $request->mediciens,
                'medical_history'=>$request->medical_history
            ]);
              return redirect()->route('record.index')->with('success', 'تم التعديل  بنجاح');
          
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d=userRecord::findOrFail($id);
        $d->delete($id);
        return redirect()->route('record.index')->with('success', 'تم الحذف  بنجاح');

    }
}
