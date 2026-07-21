<?php

namespace App\Livewire\Cohorts\Register;

use App\Models\CompanyDocument;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
#[Title('Inscription - Documents Légaux')]
class Step3 extends BaseRegisterComponent
{
    use WithFileUploads;

    public $has_legal_documents = false;
    public $id_nat = '';
    public $rccm = '';
    public $tax_id = '';
    public $id_nat_file;
    public $rccm_file;
    public $tax_id_file;
    public $company_brochure;
    public $company_name = '';

    protected function getStepNumber(): int
    {
        return 3;
    }

    protected function loadData(): void
    {
        $registration = $this->getRegistration();
        if ($registration && $registration->company) {
            $company = $registration->company;
            $this->company_name = $company->name;
            $this->has_legal_documents = $company->documents()->exists();
            
            $docNat = $company->documents()->where('type', 'id_nat')->first();
            if ($docNat) $this->id_nat = $docNat->document_number;
            
            $docRccm = $company->documents()->where('type', 'rccm')->first();
            if ($docRccm) $this->rccm = $docRccm->document_number;
            
            $docTax = $company->documents()->where('type', 'tax_id')->first();
            if ($docTax) $this->tax_id = $docTax->document_number;
        }
    }

    public function rules()
    {
        return [
            'has_legal_documents' => 'boolean',
            'id_nat_file'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'rccm_file'           => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'tax_id_file'         => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'company_brochure'    => 'nullable|file|mimes:pdf,jpg,jpeg,png,ppt,pptx|max:20480',
        ];
    }

    public function nextStep()
    {
        $this->validate();

        $registration = $this->getRegistration();
        $company = $registration->company;

        $idNatPath      = $this->id_nat_file      ? $this->id_nat_file->store('documents/legal', 'local')      : null;
        $rccmPath       = $this->rccm_file         ? $this->rccm_file->store('documents/legal', 'local')        : null;
        $taxIdPath      = $this->tax_id_file       ? $this->tax_id_file->store('documents/legal', 'local')      : null;
        $brochurePath   = $this->company_brochure  ? $this->company_brochure->store('documents/brochures', 'local') : null;

        $documentMappings = [
            'id_nat' => [$this->id_nat, $idNatPath],
            'rccm' => [$this->rccm, $rccmPath],
            'tax_id' => [$this->tax_id, $taxIdPath],
            'brochure' => [null, $brochurePath],
        ];

        foreach ($documentMappings as $type => $data) {
            [$docNumber, $path] = $data;
            if ($path || $docNumber) {
                CompanyDocument::updateOrCreate(
                    ['company_id' => $company->id, 'type' => $type],
                    ['document_number' => $docNumber, 'file_path' => $path] // Wait, if path is null, we shouldn't overwrite existing path.
                );
            }
        }
        
        // Let's make sure we don't overwrite file_path with null if they don't upload a new file
        foreach ($documentMappings as $type => $data) {
            [$docNumber, $path] = $data;
            if ($docNumber || $path) {
                $doc = CompanyDocument::firstOrNew(['company_id' => $company->id, 'type' => $type]);
                if ($docNumber) $doc->document_number = $docNumber;
                if ($path) $doc->file_path = $path;
                $doc->save();
            }
        }

        if ($registration->current_step === 'informations_personnelles' || $registration->current_step === 'entreprise' || $registration->current_step === 'documents') {
            $registration->update(['current_step' => 'documents']);
        }

        return redirect()->route('cohorts.register.step4', $this->cohort);
    }
    
    public function previousStep()
    {
        return redirect()->route('cohorts.register.step2', $this->cohort);
    }
    
    public function clearFile(string $field)
    {
        $this->$field = null;
    }

    public function render()
    {
        return view('livewire.cohorts.register.step3');
    }
}
