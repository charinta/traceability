<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holder extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_drawing_holder',
        'holder_name',
        'holder_spec',
        'holder_diameter',
        'holder_lifetime_std',
        'holder_frequency_std',
    ];
}