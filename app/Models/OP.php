<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OP extends Model
{
    use HasFactory;

    // agar date_created bisa terbaca, bukan pake created_at
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;

    // membaca data pada tabel
    protected $table = 'tbl_register_line_op';

    // menentukan variabel yang diisi
    protected $fillable = [
        'OP',
    ];

    // agar date_created bisa terisi, bukan pake created_at
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($OP) {
            $OP->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($OP) {
            $OP->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}
