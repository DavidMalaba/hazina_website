<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Vérification de connexion')]
class VerifyLogin extends Component
{
    public $otp = '';
    public $email = '';

    public function mount()
    {
        $this->email = session('auth_email');

        if (!$this->email) {
            return redirect()->route('login');
        }
    }

    public function rules()
    {
        return [
            'otp' => 'required|string|size:6'
        ];
    }

    public function verify()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->otp_code === $this->otp && $user->otp_expires_at && $user->otp_expires_at->isFuture()) {
            // Valid OTP
            $user->update([
                'otp_code' => null,
                'otp_expires_at' => null,
            ]);

            Auth::login($user, true); // Remember me true by default for passwordless? Sure.

            session()->forget('auth_email');
            
            // Redirect to intended or default
            return redirect()->intended(route('dashboard'));
        }

        $this->addError('otp', 'Code invalide ou expiré. Veuillez vérifier ou demander un nouveau code.');
    }
    
    public function resend()
    {
        $user = User::where('email', $this->email)->first();
        if ($user) {
            $otp = $user->generateOtp();
            try {
                \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\LoginOtpMail($user, $otp));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Failed to resend login OTP: " . $e->getMessage());
            }
            session()->flash('resent', 'Un nouveau code vous a été envoyé.');
        }
    }

    public function render()
    {
        return view('livewire.auth.verify-login');
    }
}
