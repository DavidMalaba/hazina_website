<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

class VerifyOtp extends Component
{
    public $code;
    public $error = '';

    public function mount()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('filament.admin.auth.login');
        }

        // Generate and send an OTP only if the user doesn't have a valid one
        if (!$user->otp_code || !$user->otp_expires_at || $user->otp_expires_at < now()) {
            $otp = $user->generateOtp();
            
            // Log info (optional)
            $log = \App\Models\AuthenticationLog::where('user_id', $user->id)->latest()->first();
            $ip = $log ? $log->ip_address : request()->ip();
            $device = $log ? "{$log->browser} sur {$log->platform}" : 'Inconnu';
            $location = $log ? (($log->city && $log->country) ? "{$log->city}, {$log->country}" : 'Inconnue') : 'Inconnue';
            
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TwoFactorCodeMail($user, $otp, $ip, $device, $location));
        }
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.auth.verify-otp');
    }

    public function verify()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('filament.admin.auth.login');
        }

        if ($user->otp_code === $this->code && $user->otp_expires_at > now()) {
            session(['otp_verified' => true]);
            $user->update(['otp_code' => null, 'otp_expires_at' => null]);
            return redirect()->route('filament.admin.pages.dashboard');
        }

        $this->error = 'Code invalide ou expiré.';
    }

    public function resend()
    {
        $user = auth()->user();
        if ($user) {
            $otp = $user->generateOtp();
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\TwoFactorCodeMail($user, $otp));
            $this->error = 'Un nouveau code a été envoyé.';
        }
    }
}
