<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOtpOnLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $user = $event->user;
        
        if ($user && $user instanceof \App\Models\User) {
            $otp = $user->generateOtp();
            
            // Get latest auth log to extract info, or parse it directly
            $log = \App\Models\AuthenticationLog::where('user_id', $user->id)->latest()->first();
            
            $ip = $log ? $log->ip_address : request()->ip();
            $device = $log ? "{$log->browser} sur {$log->platform}" : 'Inconnu';
            $location = $log ? (($log->city && $log->country) ? "{$log->city}, {$log->country}" : 'Inconnue') : 'Inconnue';
            
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TwoFactorCodeMail($user, $otp, $ip, $device, $location));
            
            session(['otp_verified' => false]);
        }
    }
}
