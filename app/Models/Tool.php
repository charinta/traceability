<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tool extends Model
{
    use HasFactory;
    // agar date_created bisa terbaca, bukan pake created_at
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;


    // membaca data pada tabel
    protected $table = 'tbl_register_tool';

    // menentukan variabel yang diisi
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
        'washing_ct',
        'grinding_ct',
        'setting_ct',
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

    // relasi ke tbl_register_holder
    public function holder()
    {
        return $this->belongsTo(Holder::class, 'holder_id');
    }
}
