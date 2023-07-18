<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standar extends Model
{
    use HasFactory;
    protected $fillable = [
        'standard_value',
        'standard_string',
        'standard_image',
        'remark',
    ];
}
