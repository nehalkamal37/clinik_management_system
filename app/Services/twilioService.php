<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $client;

    public function __construct()
    {
        $sid = config('twilio.sid');
        $token = config('twilio.token');

        $this->client = new Client($sid, $token);
    }

    public function sendWhatsAppMessage($to, $message)
    {
        $this->client->messages->create(
            "whatsapp:$to",
            [
                'from' => "whatsapp:" . config('twilio.from'),
                'body' => $message
            ]
        );
    }
}