<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HolderPosition extends Model
{
    protected $createdAtColumn = 'date_created';
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_holder_position';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($holder_position) {
            $holder_position->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($holder_position) {
            $holder_position->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}
