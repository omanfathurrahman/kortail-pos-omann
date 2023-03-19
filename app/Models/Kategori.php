<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;
    // use HasFactory;

    public $table = 'kategori';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama', 
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    // one to many
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id', 'id');
    }
}
