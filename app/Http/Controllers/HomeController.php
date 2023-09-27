<?php

namespace App\Http\Controllers;

use App\Models\Colors;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'colors' => Colors::all(['name', 'hex_code']),
        ]);
    }
}
