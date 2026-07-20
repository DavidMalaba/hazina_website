<?php

namespace App\Livewire\Cohorts;

use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public \App\Models\Cohort $cohort;

    public $currentStep = 1;
    public $totalSteps = 4;
    public $hasDraft = false;
    public $showDraftScreen = false;
    public $isSubmitted = false;

    // Step 1: Entrepreneur
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $phone = '';
    public $gender = '';
    public $birthdate = '';
    public $bio = '';

    // Step 2: Entreprise
    public $company_name = '';
    public $business_age_range = '';
    public $employee_count = '';
    public $company_description = '';
    public $industry_sector = '';
    public $company_email = '';
    public $company_website = '';
    public $address = '';
    public $province_id = '';
    public $city = '';
    public $revenue_range = '';
    public $client_count_range = '';

    public $dbProvinces = [];

    // Step 3: Legal
    public $has_legal_documents = false;
    public $id_nat = '';
    public $rccm = '';
    public $tax_id = '';
    public $id_nat_file;
    public $rccm_file;
    public $tax_id_file;
    public $company_brochure;

    // Step 4: Motivation
    public $motivation = '';
    public $problem_solved = '';
    public $solution_description = '';
    public $project_description = '';
    public $target_market = '';
    public $desired_partners = '';



    protected function sessionKey(): string
    {
        return "cohort_registration_draft_{$this->cohort->id}";
    }

    protected function textFields(): array
    {
        return [
            'currentStep',
            // Step 1
            'first_name', 'last_name', 'email', 'phone', 'gender', 'birthdate', 'bio',
            // Step 2
            'company_name', 'business_age_range', 'employee_count', 'company_description',
            'industry_sector', 'company_email', 'company_website', 'address', 'province_id', 'city',
            'revenue_range', 'client_count_range',
            // Step 3
            'has_legal_documents', 'id_nat', 'rccm', 'tax_id',
            // Step 4
            'motivation', 'problem_solved', 'solution_description', 'project_description',
            'target_market', 'desired_partners',
        ];
    }

    protected function saveToSession(): void
    {
        $data = [];
        foreach ($this->textFields() as $field) {
            $data[$field] = $this->$field;
        }
        session([$this->sessionKey() => $data]);
    }

    protected function restoreFromSession(): void
    {
        $draft = session($this->sessionKey());
        if (!$draft) {
            return;
        }

        $this->hasDraft = true;
        foreach ($this->textFields() as $field) {
            if (isset($draft[$field])) {
                $this->$field = $draft[$field];
            }
        }

        // Show the resume card instead of jumping straight into the form
        if ($this->first_name || $this->email) {
            $this->showDraftScreen = true;
        }
    }

    public function continueDraft(): void
    {
        $this->showDraftScreen = false;
    }

    public function maskedEmail(): string
    {
        if (!$this->email) return '—';
        $parts = explode('@', $this->email, 2);
        $local = $parts[0];
        $domain = $parts[1] ?? '';
        $visible = substr($local, 0, 1);
        $masked = $visible . str_repeat('*', max(3, strlen($local) - 1)) . '@' . $domain;
        return $masked;
    }

    public function maskedPhone(): string
    {
        if (!$this->phone) return '—';
        $clean = preg_replace('/\s+/', ' ', trim($this->phone));
        $len = strlen($clean);
        if ($len <= 5) return str_repeat('*', $len);
        return substr($clean, 0, 3) . str_repeat('*', max(4, $len - 5)) . substr($clean, -2);
    }

    public function clearDraft(): void
    {
        session()->forget($this->sessionKey());
        $this->hasDraft = false;
        $this->showDraftScreen = false;
        $this->currentStep = 1;
        $this->reset([
            'first_name', 'last_name', 'email', 'phone', 'gender', 'birthdate', 'bio',
            'company_name', 'business_age_range', 'employee_count', 'company_description',
            'industry_sector', 'company_email', 'company_website', 'address', 'province_id', 'city',
            'revenue_range', 'client_count_range',
            'has_legal_documents', 'id_nat', 'rccm', 'tax_id',
            'id_nat_file', 'rccm_file', 'tax_id_file',
            'motivation', 'problem_solved', 'solution_description', 'project_description',
            'target_market', 'desired_partners',
        ]);
    }


    public function mount(\App\Models\Cohort $cohort)
    {
        $this->cohort = $cohort;
        $this->dbProvinces = \App\Models\Province::orderBy('name')->get();
        $this->restoreFromSession();
    }

    public function nextStep()
    {
        $this->validateStep();
        $this->saveToSession();
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
            $this->saveToSession();
        }
    }

    public function previousStep()
    {
        $this->saveToSession();
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function clearFile(string $field)
    {
        $this->$field = null;
    }

    protected function validateStep()
    {
        match ($this->currentStep) {
            1 => $this->validate([
                'first_name'  => 'required|string|min:2',
                'last_name'   => 'required|string|min:2',
                'email'       => 'required|email',
                'phone'       => 'required|string',
                'gender'      => 'required|string',
                'birthdate'   => 'nullable|date',
                'bio'         => 'nullable|string|max:1000',
            ]),
            2 => $this->validate([
                'company_name'       => 'required|string|min:2',
                'business_age_range' => 'required|string',
                'employee_count'     => 'required|string',
                'industry_sector'    => 'required|string',
                'province_id'        => 'required|exists:provinces,id',
                'city'               => 'required|string',
                'company_email'      => 'nullable|email',
                'company_website'    => 'nullable|url',
                'revenue_range'      => 'nullable|string',
                'client_count_range' => 'nullable|string',
            ]),
            3 => $this->validate([
                'has_legal_documents' => 'boolean',
                'id_nat_file'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'rccm_file'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'tax_id_file'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'company_brochure'    => 'nullable|file|mimes:pdf,jpg,jpeg,png,ppt,pptx|max:20480',
            ]),
            4 => $this->validate([
                'motivation'           => 'required|string|min:20',
                'problem_solved'       => 'required|string|min:20',
                'solution_description' => 'required|string|min:20',
                'project_description'  => 'required|string|min:20',
                'target_market'        => 'nullable|string',
                'desired_partners'     => 'nullable|string',
            ]),
        };
    }

    public function submit()
    {
        $this->validateStep();

        $idNatPath      = $this->id_nat_file      ? $this->id_nat_file->store('documents/legal', 'local')      : null;
        $rccmPath       = $this->rccm_file         ? $this->rccm_file->store('documents/legal', 'local')        : null;
        $taxIdPath      = $this->tax_id_file       ? $this->tax_id_file->store('documents/legal', 'local')      : null;
        $brochurePath   = $this->company_brochure  ? $this->company_brochure->store('documents/brochures', 'local') : null;

        // 1. User
        $tempPassword = \Illuminate\Support\Str::random(12);
        $role = \App\Models\Role::firstOrCreate(['name' => 'entrepreneur']);
        $user = \App\Models\User::firstOrCreate(
            ['email' => $this->email],
            [
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'phone'      => $this->phone,
                'gender'     => $this->gender,
                'birthdate'  => $this->birthdate ?: null,
                'bio'        => $this->bio,
                'role_id'    => $role->id,
                'password'   => bcrypt($tempPassword), // temp password
            ]
        );

        // 2. City & Province
        $city = \App\Models\City::firstOrCreate([
            'province_id' => $this->province_id,
            'name' => trim($this->city)
        ]);

        // 3. Company
        $company = \App\Models\Company::firstOrCreate(
            [
                'name' => $this->company_name,
                'email' => $this->company_email,
            ],
            [
                'website' => $this->company_website,
                'description' => $this->company_description,
                'industry_sector' => $this->industry_sector,
                'business_age_range' => $this->business_age_range,
                'employee_count' => $this->employee_count,
                'revenue_range' => $this->revenue_range,
                'client_count_range' => $this->client_count_range,
                'address' => $this->address,
                'province_id' => $this->province_id,
                'city_id' => $city->id,
            ]
        );

        // 4. Attach User to Company
        if (!$company->users()->where('user_id', $user->id)->exists()) {
            $company->users()->attach($user->id, ['role_in_company' => 'owner']);
        }

        // 5. Save Documents
        $documentMappings = [
            'id_nat' => [$this->id_nat, $idNatPath],
            'rccm' => [$this->rccm, $rccmPath],
            'tax_id' => [$this->tax_id, $taxIdPath],
            'brochure' => [null, $brochurePath],
        ];

        foreach ($documentMappings as $type => $data) {
            [$docNumber, $path] = $data;
            if ($path) {
                \App\Models\CompanyDocument::create([
                    'company_id' => $company->id,
                    'type' => $type,
                    'document_number' => $docNumber,
                    'file_path' => $path,
                ]);
            }
        }

        // 6. Cohort Registration
        $registration = $this->cohort->registrations()->create([
            'company_id'           => $company->id,
            'motivation'           => $this->motivation,
            'problem_solved'       => $this->problem_solved,
            'solution_description' => $this->solution_description,
            'project_description'  => $this->project_description,
            'target_market'        => $this->target_market,
            'desired_partners'     => $this->desired_partners,
        ]);

        // 7. Send Emails
        try {
            // Email 1 : Recap de la candidature
            \Illuminate\Support\Facades\Mail::to($user->email)->send(
                new \App\Mail\RegistrationConfirmed($user, $company, $registration, $this->cohort)
            );

            // Email 2 : Creation du compte et mot de passe
            \Illuminate\Support\Facades\Mail::to($user->email)->send(
                new \App\Mail\AccountCreated($user, $tempPassword)
            );
        } catch (\Exception $e) {
            // Log if email fails but don't stop the flow
            \Illuminate\Support\Facades\Log::error("Failed to send registration email: " . $e->getMessage());
        }

        session()->forget($this->sessionKey());
        $this->isSubmitted = true;
    }

    public function render()
    {
        return view('livewire.cohorts.register');
    }
}
