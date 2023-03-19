<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'transaksi';

    protected $dates = [
        'deleted_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'users_id',
        'pembeli',
        'total',
        'metode_pembayaran_id',
        'deleted_at',
        'updated_at',
        'deleted_at',
    ];

    // one to one
    public function metode_pembayaran()
    {
        return $this->hasOne(MetodePembayaran::class, 'metode_pembayaran_id');
    }

    // one to many
    public function detail_transaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }

    // one to many
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
