<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolProcess extends Model
{
    use HasFactory;

    // agar date_created bisa terbaca, bukan pake created_at
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;

    // membaca data pada tabel
    protected $table = 'tbl_register_line_op';

    // menentukan variabel yang diisi
    protected $fillable = [
        'ToolProcess',
    ];

    // agar date_created bisa terisi, bukan pake created_at
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($toolprocess) {
            $toolprocess->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($toolprocess) {
            $toolprocess->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}
