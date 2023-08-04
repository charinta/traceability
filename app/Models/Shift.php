<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model
{
    use HasFactory;
    // Disable timestamps
    public $timestamps = false;
    protected $primaryKey = 'id';

    // membaca data pada tabel
    protected $table = 'tbl_shift';

    // menentukan variabel yang diisi
    protected $fillable = [
        'shift',
        'start',
        'finish',
    ];

    // agar date_created bisa terisi, bukan pake created_at
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($holder) {
            $holder->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($holder) {
            $holder->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}