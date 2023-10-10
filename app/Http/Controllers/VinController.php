<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use App\Models\Vin;

class VinController extends Controller
{
    public function show($chassisNumber)
    {
        $vin = Vin::where('cc', $chassisNumber)->firstOrFail();

        return view('welcome', [
            'colors' => Colors::all(['name', 'hex_code']),
            'vindetails' => $vin,
        ]);
    }
}
