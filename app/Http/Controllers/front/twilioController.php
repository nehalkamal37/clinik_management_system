<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\twilioService;

class twilioController extends Controller
{
  
    protected $twilio;

    public function __construct(twilioService $twilio)
    {
        $this->twilio = $twilio;
    }

  
    public function send(Request $request)
    {
        $request->validate([
            'to' => 'required|regex:/^\+?\d+$/',
            'message' => 'required|string',
        ]);

        $this->twilio->sendWhatsAppMessage($request->input('to'), $request->input('message'));
        return redirect()->back()->with('status', 'Message sent successfully');
    }


}



