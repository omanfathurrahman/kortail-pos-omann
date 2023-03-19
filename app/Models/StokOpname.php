<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StokOpname extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'stok_opname';

    protected $dates = [
        'deleted_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'produk_id',
        'tanggal',
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
