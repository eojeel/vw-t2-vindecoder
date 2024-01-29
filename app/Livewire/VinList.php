<?php

namespace App\Livewire;

use App\Models\Vin;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\WithoutUrlPagination;

#[Title('View Decoded Vin - VW T2 (1970-1979) View all vins')]
class VinList extends Component
{
    use WithoutUrlPagination, withPagination;

    public function render()
    {
        return view('livewire.vin-list', [
            'vins' => Vin::paginate(10)]
        );
    }

    public function paginationView()
{
    return 'vin-pagination';
}
}
