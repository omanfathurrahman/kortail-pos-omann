<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stok extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'stok';

    protected $dates = [
        'deleted_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'produk_id',
        'harga_beli',
        'jumlah',
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    // one to many
    public function produks()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
