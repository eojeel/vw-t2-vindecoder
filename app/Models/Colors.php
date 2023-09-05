<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    public $primaryKey = 'code';

    use HasFactory;

    public static function random()
    {
        $random = Colors::inRandomOrder()->first();

        return $random;
    }
}
