<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Holder extends Model
{
    use HasFactory;

    // agar date_created bisa terbaca, bukan pake created_at
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;

    // membaca data pada tabel
    protected $table = 'tbl_register_holder';
    protected $primaryKey = 'holder_id';


    // menentukan variabel yang diisi
    protected $fillable = [
        'date_created',
        'date_modify',
        'no_drawing_holder',
        'holder_name',
        'holder_spec',
        'holder_diameter',
        'holder_lifetime_std',
        'holder_frequency_std',
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
