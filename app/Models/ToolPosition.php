<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ToolPosition extends Model
{
    protected $createdAtColumn = 'date_created';
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_tool_position';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($historical) {
            $historical->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($historical) {
            $historical->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}
