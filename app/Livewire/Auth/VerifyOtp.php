<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;

class VerifyOtp extends Component
{
    public $code;
    public $error = '';

    #[Layout('layouts.app')]
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
