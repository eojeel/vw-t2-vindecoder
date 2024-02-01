<?php

namespace App\Livewire\Forms;

use App\Models\Vin;
use Livewire\Attributes\Validate;
use Livewire\Form;

class VinSubmitForm extends Form
{
    #[Validate('nullable|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'M-Code')]
    public string $mcode_1 = '';

    #[Validate('required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'M-Code')]
    public string $mcode_2 = '';

    #[Validate('required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'Chassis Number')]
    public string $chassis_number = '';

    #[Validate('required|size:6', as: 'Paint Code')]
    public string $paint_interior = '';

    #[Validate('required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/', as: 'Production Date')]
    public string $model_year = '';

    #[Validate('required|size:4|regex:/^[a-zA-Z0-9]{4}$/', as: 'Production Plant')]
    public string $production_plan = '';

    #[Validate('required|size:2|regex:/^[a-zA-Z0-9]{2}$/', as: 'Export Destination')]
    public string $export_destination = '';

    #[Validate('required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/', as: 'Body Model (Engine & Gearbox) Type')]
    public string $body_engine_model = '';

    public $results;

    public function save()
    {
        $validated = $this->validate();

        $this->results = Vin::decodeVin($this->all());

        Vin::updateOrCreate(
            ['chassis_number' => $this->chassis_number],
            $validated
        );
    }
}
