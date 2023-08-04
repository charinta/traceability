<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;
    protected $table = 'tbl_user_account';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'npk',
        'pos',
        'role',
        'password',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($user) {
            $user->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
    // relasi ke tbl_pos
    // public function pos()
    // {
    //     return $this->belongsTo(Pos::class, 'pos_id', 'pos_id');
    // }
}