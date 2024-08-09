<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsappController extends Controller
{
    public function sendMessage(Request $request)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $phone = $request->input('phone');
        if (substr($phone, 0, 1) !== '+') {
            $phone = '+880' . ltrim($phone, '0');
        }

        $message = $twilio->messages->create(
            'whatsapp:' . $phone, // to
            [
                'from' => 'whatsapp:' . env('TWILIO_WHATSAPP_NUMBER'),
                'body' => $request->input('message')
            ]
        );

        return redirect()->back()->with('success', 'Message sent successfully');
    }
}
