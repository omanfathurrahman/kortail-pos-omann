<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodePembayaran extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'metode_pembayaran';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'metode',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to one 
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
