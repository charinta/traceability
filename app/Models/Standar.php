<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Standar extends Model
{
    use HasFactory;
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;
    protected $table = 'tbl_register_standard_check';
    protected $fillable = [
        'pos_name',
        'item_check',
        'standard_check',
        'batas_atas',
        'batas_bawah',
        'status_data',
        //   'remark',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($standar) {
            $standar->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($standar) {
            $standar->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}
