<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data=Contact::all();
        return view('admins.dashboard.contacts.all',compact('data'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            
            'email' => 'required|email|unique:doctors|max:333',
            'subject' => 'required|min:7|max:133',
            'msg' => 'required|string|max:1255',

        ]);
    
    // إدخال البيانات في قاعدة البيانات
    Contact::create($request->all());
    return redirect('/');
    // return redirect()->route('/')->with('success', 'تم إنشاء المستخدم بنجاح');

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
        
        $data=Contact::find($id);
        return view('admins.dashboard.contacts.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors|max:333',
            'subject' => 'required|min:7|max:133',
            'msg' => 'required|string|max:1255',

        ]);
    
       // إدخال البيانات في قاعدة البيانات
  $con=Contact::find($id);
       $con->update($request->all());
  //  return view('users.front.index');
    return redirect()->route('contcts.index')->with('success', 'تم إنشاء المستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $con=Contact::findOrFail($id);
        $con->delete($id);
        return redirect()->route('contacts.index')->with('success', 'تم حذف الطبيب بنجاح');
        
    }
}
