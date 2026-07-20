<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;

class SetupPassword extends Component
{
    public $token;
    public $code;
    public $password;
    public $password_confirmation;
    public $error = '';
    public $success = false;

    public function mount($token)
    {
        $this->token = $token;
        $user = User::where('setup_token', $this->token)->first();
        
        if (!$user) {
            abort(404);
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.auth.setup-password');
    }

    public function save()
    {
        $this->validate([
            'code' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('setup_token', $this->token)->first();

        if (!$user) {
            $this->error = 'Lien invalide.';
            return;
        }

        if ($user->otp_code !== $this->code) {
            $this->error = 'Le code de vérification est incorrect.';
            return;
        }

        if ($user->otp_expires_at < now()) {
            $this->error = 'Le code a expiré. Veuillez demander un nouveau lien.';
            return;
        }

        $user->update([
            'password' => \Illuminate\Support\Facades\Hash::make($this->password),
            'setup_token' => null,
            'otp_code' => null,
            'otp_expires_at' => null,
            'email_verified_at' => now(),
        ]);

        $this->success = true;
    }
}
