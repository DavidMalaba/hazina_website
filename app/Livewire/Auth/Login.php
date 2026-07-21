<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Mail\LoginOtpMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Connexion')]
class Login extends Component
{
    public $email = '';

    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }

    public function sendOtp()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user) {
            $otp = $user->generateOtp();
            
            try {
                Mail::to($user->email)->send(new LoginOtpMail($user, $otp));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Failed to send login OTP: " . $e->getMessage());
            }
            
            // Store email in session to verify on next step
            session(['auth_email' => $this->email]);
            return redirect()->route('login.verify');
        }

        // If user doesn't exist, we just show an error.
        $this->addError('email', 'Aucun compte associé à cette adresse email.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
