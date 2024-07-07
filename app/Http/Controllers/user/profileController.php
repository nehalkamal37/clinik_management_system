<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::where('id',Auth::user()->id)->get();
     
        return view('users.dashboard.profile.all',compact('data'));
    }

  

    public function edit(string $id)
    {
        $user=User::find($id);
        $data=User::where('id',Auth::user()->id);
        return view('users.dashboard.profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
'fname'=>'string|required|max:55',
'lname'=>'string|required|max:55',
'email'=>'email|required|max:75',
'phone'=>'numeric|required|max:25',

        ]);
$user=User::find($id);
$user->update($request->all());
return redirect()->route('userprofile.index')->with('success', 'تم تحديث الموعد بنجاح');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
