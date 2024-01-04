<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VinSubmitForm extends Form
{
    #[Validate('nullable|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'M-Code')]
    public string $mmmmm = '';

    #[Validate('required|regex:/^([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'M-Code')]
    public string $mmmm = '';

    #[Validate('required|regex:/^([A-Za-z0-9]{2})\s([A-Za-z0-9]{3})\s([A-Za-z0-9]{3})$/', as: 'Chassis Number')]
    public string $cc = '';

    #[Validate('required|size:6', as: 'Paint Code')]
    public string $pp = '';

    #[Validate('required|regex:/^[a-zA-Z0-9]{2} [a-zA-Z0-9]$/', as: '(DD D) Production Date')]
    public string $dd = '';

    #[Validate('required|size:4|regex:/^[a-zA-Z0-9]{4}$/', as: '(UUUU) Production Plant')]
    public string $uu = '';

    #[Validate('required|size:2|regex:/^[a-zA-Z0-9]{2}$/', as: '(EE) Export Destination')]
    public string $ee = '';

    #[Validate('required|regex:/^[a-zA-Z0-9]{4} [a-zA-Z0-9]{2}$/', as: '(XXXX TT) Body Model (Engine & Gearbox) Type')]
    public string $tt = '';
}
