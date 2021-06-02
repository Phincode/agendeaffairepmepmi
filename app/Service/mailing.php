<?php

namespace App\Service;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



class mailing{
    
    public static function sendNotification($reveivermail,$notif){
        $data=[$reveivermail,$notif];
        Mail::send('mail', ['data'=>$data], function($message) use ($data) {
            $message->to($data[0], '')->subject("BRAINSTORMING AGENCE D'AFFAIRES:NOTIFICATION");
            $message->from('infos@agencesdaffairespmepmi.ci','INFOS');
         });
    }
}