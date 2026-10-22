<?php

namespace App\Livewire;

use App\Models\Vin;
use App\Services\VinDecoder;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;

#[Title('View Decoded Vin - VW T2 (1970-1979) Vin Decoder')]
class VinShow extends VinForm
{
    public function mount(string $chassisNumber = ''): void
    {
        parent::mount();

        $vin = Vin::where('chassis_number', $this->formatChassisNumber($chassisNumber))->firstOrFail();

        $this->form->fill(array_filter($vin->only(Vin::FIELDS)));
        $this->results = app(VinDecoder::class)->decode($vin->only(Vin::FIELDS));
    }

    public function rendered(): void
    {
        $color = $this->results?->colorDisplay->first()?->hex_code;

        if ($color) {
            $this->busColor         = $color;
            $this->busColorSelector = $color;
        }
    }

    /**
     * Turns a chassis number from the URL ("12345678") back into its stored format ("12 345 678").
     */
    private function formatChassisNumber(string $chassisNumber): string
    {
        return Str::substr($chassisNumber, 0, 2).' '.Str::substr($chassisNumber, 2, 3).' '.Str::substr($chassisNumber, 5, 3);
    }
}
