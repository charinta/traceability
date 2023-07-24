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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $createdAtColumn = 'date_created';
    public $timestamps = false;
     protected $table = 'tbl_user_account';
    protected $fillable = [
        'username',
        'npk',
        'pos_id',
        'role',
        'password',
    ];

    // penghubung relasi tp masih bingung
    public function user(){
        return $this->hasMany((User::class));
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

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