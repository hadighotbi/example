<?php

namespace App\Services\Notification;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class Notification
{
    public function sendEmail (User $user,Mailable $mailable)
    {
        return Mail::to($user)->send($mailable);
    }

    public function sendSms (User $user, string $text)
    {
        $client = new Client();
        $response=$client->post(config('services.sms.uri'),$this->prepareDataForSms($user,$text));
    }
}
