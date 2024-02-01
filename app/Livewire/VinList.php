<?php

namespace App\Livewire;

use App\Models\Vin;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

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
