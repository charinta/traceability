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
    protected $table = 'tbl_register_standar_check';
    protected $fillable = [
        'pos_id',
        'item_check',
        'standard_check',
        'standard_value',
        'batas_atas',
        'batas_bawah',
        'standard_string',
        'standard_image',
        'remark',
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

// relasi ke tbl_pos
    public function pos()
        {
            return $this->hasMany(Pos::class, 'pos_id');
        }

}