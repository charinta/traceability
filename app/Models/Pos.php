<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pos extends Model
{
    protected $createdAtColumn = 'date_created';
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_pos';
    protected $primaryKey = 'pos_id';
    protected $fillable = [
        'pos_name', 'date_created', 'date_modify', 'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pos) {
            $pos->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($pos) {
            $pos->date_modify = Carbon::now('Asia/Jakarta');
        });
    }

    // relasi ke tbl_user_account
    public function users()
        {
            return $this->hasMany(User::class, 'pos_id');
        }

    // relasi ke tbl_register_standar_check
    public function standar()
        {
            return $this->hasMany(Standar::class, 'pos_id');
        }

}