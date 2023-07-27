<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RegrindingAuto extends Model
{
    use HasFactory;
    // agar date_created bisa terbaca, bukan pake created_at
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;

    
    // membaca data pada tabel
    protected $table = 'tbl_regrinding_auto';

    // menentukan variabel yang diisi
    protected $fillable = [
        'no_drawing_tool',
        'qr_making',
        'item_check',
        'standard_check',
        'actual_check',
        'judgment',
        'status_check',
        'pic',
    ];

    // agar date_created bisa terisi, bukan pake created_at
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($regrinding_auto) {
            $regrinding_auto->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($regrinding_auto) {
            $regrinding_auto->date_modify = Carbon::now('Asia/Jakarta');
});
}
}