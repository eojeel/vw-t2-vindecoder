<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use App\Models\Vin;
use Illuminate\Support\Str;

class VinController extends Controller
{
    public function show($chassisNumber)
    {

        $chassisNumber = Str::substr($chassisNumber, 0, 2).' '.Str::substr($chassisNumber, 2, 3).' '.Str::substr($chassisNumber, 5, 3);

        $vin = Vin::where('cc', $chassisNumber)->firstOrFail();

        return view('welcome', [
            'colors' => Colors::all(['name', 'hex_code']),
            'vindetails' => $vin,
        ]);
    }
}
