<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_drawing_tool',
        'tool_type',
        'tool_spec',
        'tool_diameter',
        'tool_lifetime_std',
        'tool_frequency_std',
        'line',
        'op',
        'no_drawing_holder',
    ];
}