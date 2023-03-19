<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'shift';

    protected $dates = [
        'deleted_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'jam_buka',
        'jam_tutup',
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    // one to one
    public function shift_kasir()
    {
        return $this->belongsTo(ShiftKasir::class, 'shift_id', 'id');
    }
}
