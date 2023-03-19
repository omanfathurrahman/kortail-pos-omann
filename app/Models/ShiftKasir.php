<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShiftKasir extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'shift_kasir';

    protected $dates = [
        'deleted_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'users_id',
        'shift_id',
        'waktu_buka',
        'waktu_tutup',
        'tunai_awal',
        'tunai_akhir',
        'status',
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    // one to one
    public function shift()
    {
        return $this->hasOne(Shift::class, 'shift_id');
    }

    // one to many
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
