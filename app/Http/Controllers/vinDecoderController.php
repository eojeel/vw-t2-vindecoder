<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vinDecoderController extends Controller
{
    public function vin(Request $request)
    {
        return dd($request->all());
    }
}
