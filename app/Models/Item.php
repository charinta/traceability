<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    protected $createdAtColumn = 'date_created';
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_item_check';
    protected $fillable = [
        'date_created', 'date_modify', 'item_check'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($item) {
            $item->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}

