<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vin extends Model
{
    use HasFactory;

    /** @var list<string> */
    public const array FIELDS = [
        'chassis_number',
        'mcode_1',
        'mcode_2',
        'paint_interior',
        'model_year',
        'production_plan',
        'export_destination',
        'body_engine_model',
    ];

    protected $fillable = self::FIELDS;
}
