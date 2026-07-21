<?php

namespace App\Livewire\Cohorts\Register;

use App\Models\City;
use App\Models\Company;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Inscription - Entreprise')]
class Step2 extends BaseRegisterComponent
{
    public $company_name = '';
    public $business_age_range = '';
    public $employee_count = '';
    public $company_description = '';
    public $industry_sector = '';
    public $company_email = '';
    public $company_website = '';
    public $address = '';
    public $company_province_id = '';
    public $company_city = '';
    public $revenue_range = '';
    public $client_count_range = '';

    protected function getStepNumber(): int
    {
        return 2;
    }

    protected function loadData(): void
    {
        $registration = $this->getRegistration();
        if ($registration && $registration->company) {
            $company = $registration->company;
            $this->company_name = $company->name;
            $this->company_email = $company->email;
            $this->company_website = $company->website;
            $this->company_description = $company->description;
            $this->industry_sector = $company->industry_sector;
            $this->business_age_range = $company->business_age_range;
            $this->employee_count = $company->employee_count;
            $this->revenue_range = $company->revenue_range;
            $this->client_count_range = $company->client_count_range;
            $this->address = $company->address;
            $this->company_province_id = $company->province_id;
            $this->company_city = $company->city ? $company->city->name : '';
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
        if (!$this->company_province_id) return [];
        return \App\Models\City::where('province_id', $this->company_province_id)->orderBy('name')->get();
    }

    
    public function updatedCompanyProvinceId()
    {
        $this->company_city = '';
    }

    public function rules()
    {
        return [
            'company_name'       => 'required|string|min:2',
            'business_age_range' => 'required|string',
            'employee_count'     => 'required|string',
            'industry_sector'    => 'required|string',
            'company_province_id'=> 'required|exists:provinces,id',
            'company_city'       => 'required|string',
            'company_email'      => 'nullable|email',
            'company_website'    => 'nullable|url',
            'revenue_range'      => 'nullable|string',
            'client_count_range' => 'nullable|string',
        ];
    }

    public function nextStep()
    {
        $this->validate();

        $user = Auth::user();
        $city = City::firstOrCreate([
            'province_id' => $this->company_province_id,
            'name' => trim($this->company_city)
        ]);
        
        $company = Company::firstOrCreate(
            ['name' => $this->company_name],
            [
                'email' => $this->company_email,
                'website' => $this->company_website,
                'description' => $this->company_description,
                'industry_sector' => $this->industry_sector,
                'business_age_range' => $this->business_age_range,
                'employee_count' => $this->employee_count,
                'revenue_range' => $this->revenue_range,
                'client_count_range' => $this->client_count_range,
                'address' => $this->address,
                'province_id' => $this->company_province_id,
                'city_id' => $city->id,
            ]
        );
        
        // Update if existing company but data changed
        if (!$company->wasRecentlyCreated) {
            $company->update([
                'email' => $this->company_email,
                'website' => $this->company_website,
                'description' => $this->company_description,
                'industry_sector' => $this->industry_sector,
                'business_age_range' => $this->business_age_range,
                'employee_count' => $this->employee_count,
                'revenue_range' => $this->revenue_range,
                'client_count_range' => $this->client_count_range,
                'address' => $this->address,
                'province_id' => $this->company_province_id,
                'city_id' => $city->id,
            ]);
        }
        
        if (!$company->users()->where('user_id', $user->id)->exists()) {
            $company->users()->attach($user->id, ['role_in_company' => 'owner']);
        }

        $registration = $this->getRegistration();
        $updates = ['company_id' => $company->id];
        
        if ($registration->current_step === 'informations_personnelles' || $registration->current_step === 'entreprise') {
            $updates['current_step'] = 'entreprise';
        }
        
        $registration->update($updates);

        return redirect()->route('cohorts.register.step3', $this->cohort);
    }
    
    public function previousStep()
    {
        return redirect()->route('cohorts.register.step1', $this->cohort);
    }

    public function render()
    {
        return view('livewire.cohorts.register.step2');
    }
}
