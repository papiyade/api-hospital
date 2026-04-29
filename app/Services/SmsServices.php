<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    public static function send($to, $message)
    {
        try {
            $sid = env('TWILIO_SID');
            $token = env('TWILIO_TOKEN');
            $from = env('TWILIO_FROM');

            $response = Http::withBasicAuth($sid, $token)
                ->asForm()
                ->post("https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json", [
                    'From' => $from,
                    'To' => $to,
                    'Body' => $message,
                ]);

            if (!$response->successful()) {
                Log::error("Twilio error: " . $response->body());
            }

            return $response->json();
        } catch (\Throwable $e) {
            Log::error("SMS Exception: " . $e->getMessage());
            return null;
        }
    }
}
