<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OP extends Model
{
    protected $createdAtColumn = 'date_created';
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_op';
    protected $fillable = [
        'line_id',
        'op',
    ];

    // app/Models/OP.php

    public function ToolProcess()
    {
        return $this->hasMany(ToolProcess::class, 'op_id');
    }

    // agar date_created bisa terisi, bukan pake created_at
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ops) {
            $ops->date_created = Carbon::now('Asia/Jakarta');
        });

        static::updating(function ($ops) {
            $ops->date_modify = Carbon::now('Asia/Jakarta');
        });
    }
}
