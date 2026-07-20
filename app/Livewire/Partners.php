<?php

namespace App\Livewire;

use Livewire\Component;

class Partners extends Component
{
    public function render()
    {
        $partnersGrouped = \App\Models\Company::where('type', 'partner')
            ->get()
            ->groupBy('partner_category');

        $categoryNames = [
            'institution' => 'Institutions Publiques',
            'mine' => 'Entreprises Minières',
            'finance' => 'Écosystème & Finance',
            'autre' => 'Autres Partenaires',
        ];

        return view('livewire.partners', [
            'partnersGrouped' => $partnersGrouped,
            'categoryNames' => $categoryNames,
        ]);
    }
}
