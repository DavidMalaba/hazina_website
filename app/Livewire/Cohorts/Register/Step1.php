<?php

namespace App\Livewire\Cohorts\Register;

use App\Models\City;
use App\Models\Province;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Inscription - Informations Personnelles')]
class Step1 extends BaseRegisterComponent
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $gender = '';
    public $birthdate = '';
    public $bio = '';
    public $user_province_id = '';
    public $user_city = '';

    public $emailExists = false;

    protected function getStepNumber(): int
    {
        return 1;
    }

    protected function loadData(): void
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
            $this->phone = str_replace('+243', '', $user->phone ?? '');
            $this->gender = $user->gender;
            $this->birthdate = $user->birthdate ? $user->birthdate->format('Y-m-d') : null;
            $this->bio = $user->bio;
            $this->user_province_id = $user->province_id;
            $this->user_city = $user->city ? $user->city->name : '';
        }
    }

    #[Computed]
    public function dbProvinces()
    {
        return Province::orderBy('name')->get();
    }

    
    #[Computed]
    public function availableCities()
    {
        if (!$this->user_province_id) return [];
        return \App\Models\City::where('province_id', $this->user_province_id)->orderBy('name')->get();
    }

    
    public function updatedUserProvinceId()
    {
        $this->user_city = '';
    }

    public function rules()
    {
        $userId = Auth::id();
        return [
            'first_name'       => 'required|string|min:2',
            'last_name'        => 'required|string|min:2',
            'email'            => [
                'required', 'email',
                // Wait, we handle unique manually to show magic link.
                // But we don't want it to fail standard validation first if we handle it manually.
                // We'll leave email required, and do manual uniqueness check in nextStep().
            ],
            'phone'            => [
                'required', 'digits:9',
                // Check uniqueness in database, assuming +243 prepended
                Rule::unique('users', 'phone')->ignore($userId)
            ],
            'gender'           => 'required|string',
            'birthdate'        => 'nullable|date',
            'bio'              => 'nullable|string|max:1000',
            'user_province_id' => 'required|exists:provinces,id',
            'user_city'        => 'required|string',
        ];
    }

    // Override validation to format phone for uniqueness check
    public function validateStep()
    {
        // Custom phone validation logic because it's stored with +243
        $this->validate();

        $fullPhone = '+243' . $this->phone;
        $userWithPhone = User::where('phone', $fullPhone)->first();
        if ($userWithPhone && (!Auth::check() || Auth::id() !== $userWithPhone->id)) {
            $this->addError('phone', 'Ce numéro de téléphone est déjà utilisé.');
            return false;
        }

        return true;
    }

    public function nextStep()
    {
        if (!$this->validateStep()) return;

        // Manual Email Check for Magic Link
        $userWithEmail = User::where('email', $this->email)->first();
        if ($userWithEmail && (!Auth::check() || Auth::id() !== $userWithEmail->id)) {
            $this->addError('email', 'Cette adresse email est déjà utilisée.');
            $this->emailExists = true;
            return;
        }
        $this->emailExists = false;

        // Save
        $city = City::firstOrCreate([
            'province_id' => $this->user_province_id,
            'name' => trim($this->user_city)
        ]);

        $user = Auth::user();
        if (!$user) {
            $tempPassword = Str::random(12);
            $role = Role::firstOrCreate(['name' => 'entrepreneur']);
            
            $user = User::create([
                'email'      => $this->email,
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'phone'      => '+243' . $this->phone,
                'gender'     => $this->gender,
                'birthdate'  => $this->birthdate ?: null,
                'bio'        => $this->bio,
                'role_id'    => $role->id,
                'password'   => bcrypt($tempPassword),
                'province_id'=> $this->user_province_id,
                'city_id'    => $city->id,
            ]);
            Auth::login($user, true);
            session()->regenerate();
            
            try {
                Mail::to($user->email)->send(
                    new \App\Mail\AccountCreated($user, $tempPassword)
                );
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Email AccountCreated failed: " . $e->getMessage());
            }
        } else {
            $user->update([
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'phone'      => '+243' . $this->phone,
                'gender'     => $this->gender,
                'birthdate'  => $this->birthdate ?: null,
                'bio'        => $this->bio,
                'province_id'=> $this->user_province_id,
                'city_id'    => $city->id,
            ]);
        }

        $registration = $user->cohortRegistrations()->firstOrCreate(
            ['cohort_id' => $this->cohort->id],
            ['status' => 'draft']
        );
        
        if ($registration->wasRecentlyCreated || $registration->current_step === 'informations_personnelles') {
            $registration->update(['current_step' => 'informations_personnelles']);
        }

        return redirect()->route('cohorts.register.step2', $this->cohort);
    }

    public function render()
    {
        return view('livewire.cohorts.register.step1');
    }
}
