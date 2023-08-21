<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Line extends Model
{
    use HasFactory;

    // agar date_created bisa terbaca, bukan pake created_at
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;

    // membaca data pada tabel
    protected $table = 'tbl_line';

    // menentukan variabel yang diisi
    protected $fillable = [
        'line',
    ];

    public function ops()
    {
        return $this->hasMany(OP::class, 'line_id');
    }

    // agar date_created bisa terisi, bukan pake created_at
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($line) {
            $line->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($line) {
            $line->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}
