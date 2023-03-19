<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'produk';

    protected $dates = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'harga',
        'kategori_id',
        'merchant_id',
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    // one to many
    public function kategoris()
    {
        return $this->hasMany(Kategori::class, 'kategori_id');
    }

    // one to many
    public function merchant()
    {
        return $this->hasOne(Merchant::class, 'merchant_id');
    }

    // one to many
    public function stoks()
    {
        return $this->hasMany(Stok::class, 'produk_id');
    }

    // one to many
    public function stock_opnames()
    {
        return $this->hasMany(StockOpname::class, 'produk_id');
    }
}
