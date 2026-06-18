<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class SmsServices
{
    public static function send($to, $message)
    {
        try {
            $sid = env('TWILIO_SID');
            $token = env('TWILIO_TOKEN');
            $from = env('TWILIO_FROM');

            $client = new Client($sid, $token);

            $client->messages->create($to, [
                'from' => $from,
                'body' => $message,
            ]);

            return true;
        } catch (\Throwable $e) {
            Log::error("Twilio SMS error: " . $e->getMessage());
            return false;
        }
    }
}