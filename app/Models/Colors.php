<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public $incrementing = false;

    public static function random(): ?self
    {
        return static::inRandomOrder()->first();
    }
}
